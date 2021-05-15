<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_results extends CI_Controller {
    private $organizer_id = '';
    function __construct(){
        parent::__construct();
        $this->load->model("Common_modal");
        $this->user_id = $this->session->userdata('user_id');	
        if (!$this->session->userdata('user_name')) {
            redirect('admin/login/');
        }
        
    }
    
    function index(){
        // $commonModal = $this->common_modal;

        // $select = "SELECT * FROM organizers WHERE is_delete=?";
        // $param = array(0);
        // $returnData = $commonModal->customQuery($select, $param);

        // $data['list'] = array();
        // if($returnData->num_rows()>0){
        //     $data['list'] = $returnData->result_array();
        // }

        $data['breadcrumb'] = 'Scorecard';
        $data['page'] = 'admin/organizer/index';
        $this->load->view('admin/common/middle', $data);
    }

     public function getData(){
        $organizer_id =  $this->organizer_id;
        $postData = $this->input->post();
        
        $response = array();

         ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        
        ## Search 
        $searchQuery = "";
        if($searchValue != ''){
           $email = sha1(trim($searchValue));
           $mobile = sha1(trim($searchValue));
           $searchQuery = "(A_U.name like '%{$searchValue}%')";
        }
        

        ## Total number of records without filtering
        $this->db->select('SUM(Q_S.correct) as total_score');
        $this->db->from('quiz_submit AS Q_S');
        $this->db->join('admin_users as A_U','A_U.id = Q_S.user_id');
        $this->db->group_by('Q_S.user_id');
        $nonFilteredRecords = $this->db->get();
        $totalRecords = $nonFilteredRecords->num_rows();
        ## Total number of records without filtering

        
        ## Total number of record with filtering
        $this->db->select('SUM(Q_S.correct) as total_score');
        $this->db->from('quiz_submit AS Q_S');
        $this->db->join('admin_users as A_U','A_U.id = Q_S.user_id');
        $this->db->group_by('Q_S.user_id');
        if($searchValue != ''){
           $this->db->where($searchQuery);
        }
        $filteredRecords = $this->db->get();
        $totalRecordwithFilter = $filteredRecords->num_rows();
        ## Total number of record with filtering

        ## Fetch records
         $this->db->select('SUM(Q_S.correct) as total_score,Q_S.created,A_U.profile_picture,A_U.name');
        $this->db->from('quiz_submit AS Q_S');
        $this->db->join('admin_users as A_U','A_U.id = Q_S.user_id');
        $this->db->group_by('Q_S.user_id');
        if($searchValue != ''){
           $this->db->where($searchQuery);
        }
        if($columnName!='' || $columnSortOrder!=''){
            $this->db->order_by($columnName, $columnSortOrder);
        }
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();

        $data = array();

// print_r($this->db->last_query());
// die;
//        display(show_query());
//        die;
        foreach($records as $record ){
          
            $created = date('d-m-Y', strtotime($record->created));
            
        
            $profile_pic = "<img class='profile-user-img img-fluid img-circle' src='".base_url("uploads/admin_users/{$record->profile_picture}")."' alt='User profile picture'>";
                      
                
            $data[] = array( 
                "profile_pic"=>$profile_pic,
                "name"=>$record->name,
                "total_score"=>$record->total_score,
                "created"=>$created,

            ); 
        }

        ## Response
        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecordwithFilter,
           "iTotalDisplayRecords" => $totalRecords,
           "aaData" => $data
        );

//        return $response; 

        echo json_encode($response);
    }
    
}