<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("Common_modal");
        $this->load->helper('cookie');
//        $version = 'version 1.0.1';
    }
    
    public function index(){
        $commonModal = $this->Common_modal;
        $data = '';
//        $data['version']= 'version 1.0.1';
        if($this->input->post()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            $selectQuery = "SELECT A_U.id,A_U.name,A_U.profile_picture,A_U.password,A_U.admin_type
                            FROM admin_users AS A_U 
                            WHERE A_U.username=?";
            $selectValue = array($username);

            $returnInfo = $commonModal->customQuery($selectQuery, $selectValue);


            if ($returnInfo->num_rows() > 0) {
                 $userData = $returnInfo->row(); 
                if($userData->password != md5($password)){
                    $this->session->set_flashdata('error', 'Please Enter Valid Username/Password');
                    redirect('admin/login');
                }
                $sessionArray = array('user_id'=>$userData->id, 'user_name'=>$userData->name,'profile_picture'=>$userData->profile_picture,'user_type'=>$userData->admin_type);
                $this->session->set_userdata($sessionArray);
                
                $this->session->set_flashdata('success', "Welcome {$userData->name}");
//                $this->session->set_flashdata('success', "Welcome {$this->session->name}");
               
                if($userData->admin_type == 'SU'){
                    redirect('admin/All_results');
                }else{
                    $eventCount = $this->checkUserExist($this->session->userdata('user_id'));
                    if($eventCount == 1){
                     redirect('admin/Mcq_test/result');
                    }else{
                     redirect('admin/Mcq_test');  
                    }
                }
            }else{
                $this->session->set_flashdata('error', 'Please Enter Your Registered Username');
                redirect('admin/login');
            }
        }
        $this->load->view('admin/login/index',$data);
    }
    
     public function logout(){
        
        $this->session->unset_userdata('user_name','');
        $this->session->unset_userdata('user_id','');
        $this->session->unset_userdata('profile_picture','');
        
        redirect('admin/login');
    }

    public function checkUserExist($userId){
        $commonModal = $this->Common_modal;
        $selectUserEvent = "SELECT count(quiz_submit.user_id) as quiz_count FROM quiz_submit WHERE user_id=?;";
        $paramUserEvent = array($userId);
        $returnInfo = $commonModal->customQuery($selectUserEvent, $paramUserEvent);
        if($returnInfo->num_rows()>0){
                $eventData = $returnInfo->row();
                if($eventData->quiz_count > 0){
                    return 1;
                }
                else{
                    return 0;
                }
            }
    
    }
    
   
}
