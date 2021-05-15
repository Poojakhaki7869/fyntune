<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcq_test extends CI_Controller {
    private $user_id = '';
    function __construct(){
        parent::__construct();
        $this->load->model("Common_modal");
        $this->user_id = $this->session->userdata('user_id');	
        if (!$this->session->userdata('user_name')) {
            redirect('admin/login/');
        }
        
    }
    
    public function index(){

        $api_url =  "https://opentdb.com/api.php?amount=10";
        $json_data = file_get_contents($api_url);
        $response_data = json_decode($json_data);
        $data['quiz_data'] = $response_data->results;

        // print_r($response_data->results);
        // die;
        // $commonModal = $this->common_modal;

        // $select = "SELECT * FROM organizers WHERE is_delete=?";
        // $param = array(0);
        // $returnData = $commonModal->customQuery($select, $param);

        // $data['list'] = array();
        // if($returnData->num_rows()>0){
        //     $data['list'] = $returnData->result_array();
        // }

        $data['breadcrumb'] = 'MCQ Test';
        $data['page'] = 'admin/mcq/quiz';

        $this->load->view('admin/common/middle', $data);
    }
    

    public function SubmitQuiz(){
        $commonModal = $this->Common_modal;

        if(isset($_POST)){
        $dateTime = date("Y-m-d H:i:s");
        $questions = $this->input->post('question');

        // $total_correct_answer = 0;
         foreach ($questions as $key => $question) {
                $insertQueKeyValue = array(
                    'user_id' => $this->user_id,
                    'question' => trim($question),
                    "created" => $dateTime,
                );
                $queId = $commonModal->insertQuery('quiz', $insertQueKeyValue);
                
                if($queId>0){
                    $optKey = $key+1;
                    $options = $this->input->post('option_'. $optKey);
                    $selectedOption = $this->input->post('radio_'. $optKey); 

                    $correct_answer = $this->input->post('correct_answer_'.$optKey); 
                    // $option_id = $quiz_options_id_array[$key];


                    
                    foreach($options AS $optKey=>$optVal){
                        
                       
                        $insertOptionKeyValue = array(
                            'quiz_id' => $queId,
                            'option' => trim($optVal),
                            "created" => $dateTime,
                        );
                        $optionId = $commonModal->insertQuery('quiz_options', $insertOptionKeyValue);
                        
                        if($optionId>0){
                            $correct_status = 0;
                            if ($selectedOption == $optKey) {
                                $selected_option_id = $optionId;
                                $correct_status = 1;
                                // $total_correct_answer++;
                            }

                            
                            if($correct_answer == $optVal){
                                $updateKeyValue = array('correct_answer_id'=>$optionId);
                                $clause = ['id' => $queId];
                                $quizId = $commonModal->updateQuery('quiz',$updateKeyValue, $clause);
                            }
                           
                        }else{
                            $this->session->set_flashdata('error', 'Fail To Add Quiz!');
                            redirect('admin/Mcq_test');
                        }
                    }

                    $table_array = array(
                        'quiz_id' => $queId,
                        'quiz_options_id' => $selected_option_id,
                        'user_id' => $this->user_id,
                        'correct' => $correct_status,
                        'created' => date('Y-m-d H:i:s'),
                    );
                    
                    $submitId = $commonModal->insertQuery('quiz_submit',$table_array);

                    if($submitId>0){
                        // $this->session->set_flashdata('success', 'Quiz Added Successfully..!'.$total_correct_answer);
                        // redirect('admin/Mcq_test');
                       
                    }else{
                        $this->session->set_flashdata('error', 'Fail To Add Quiz!');
                        redirect('admin/Mcq_test');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Fail To Add Quiz!');
                    redirect('admin/Mcq_test');
                }
            }
            $this->session->set_flashdata('success', 'Quiz Added Successfully..!');
            redirect('admin/Mcq_test/result');

            }else{
                $this->session->set_flashdata('error', 'Fail To Add Quiz!');
                redirect('admin/Mcq_test');
            }
    }


    public function result(){
        $commonModal = $this->Common_modal;
        // print_r($response_data->results);
        // die;
        $selectQuery = "SELECT COUNT(QS.user_id) as total_que,
                    IFNULL((SELECT COUNT(QO.correct) from quiz_submit AS QO 
                    WHERE QO.correct=1 AND QO.user_id= ?),0) AS total_correct
                    FROM quiz_submit as QS
                    WHERE QS.user_id = ?";
        $selectValue = array($this->user_id,$this->user_id);
 
        $returnInfo = $commonModal->customQuery($selectQuery, $selectValue);
        if ($returnInfo->num_rows() > 0) {
            $returnData = $returnInfo->row();
            
            $data['total_que']  = $returnData->total_que;
            $data['total_correct']  = $returnData->total_correct;

        }
        $data['breadcrumb'] = 'Result';
        $data['page'] = 'admin/mcq/result';

        $this->load->view('admin/common/middle', $data);
    }

}