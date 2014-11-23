<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Confirm extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('session');
		$this->load->model('tank_auth/users'); 
		$this->load->model('confirm_model'); 
		$this->load->model('profile/profile_model'); 
   // $this->load->model('home/home_model'); 

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}    
	}
	

	public function index()
    {
        $data['user_id']	= $this->tank_auth->get_user_id();
        $data['info']=$this->confirm_model->get_details($data['user_id']);	
       
	    $this->load->library('form_validation');   
	    $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('reg_number', 'Reg_number', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('college', 'college', 'trim|required'); 
         $this->form_validation->set_rules('course', 'Course', 'trim|required');
         $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
         $this->form_validation->set_rules('roll_number', 'Roll Number', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|min_length[1]|max_length[1]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
        $this->form_validation->set_rules('joining_year', 'Joining_year', 'trim|required');
              
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>','</div>');

        if($this->form_validation->run() === FALSE)
        {   $data['submitted']="";
            $data['current_section']="confirm";	
			//$data['basic_info']=$this->profile_model->get_name_profilepic($data['user_id']);		
            $data['colleges']=$this->confirm_model->get_colleges();          
            $data['suggested_username']	=$this->confirm_model->get_suggested_username($data['user_id']);

			$this->load->view("auth/confirm",$data);  
        }
        else
        {
            $res1 = $this->confirm_model->update_users($this->tank_auth->get_user_id(),
                array('username' => $this->input->post('username'),
                      'reg_number' => $this->input->post('reg_number'),
                      'college_code' => $this->input->post('college')
                )
                );
             $res2 = $this->confirm_model->update_user_profiles($this->tank_auth->get_user_id(),
                array('roll_number' => $this->input->post('roll_number'),
                      'birthday' => $this->input->post('birthday'),
                      'gender' => $this->input->post('gender'),
                      'joining_year' => $this->input->post('yearofjoining'),
                      'course' => $this->input->post('course'),
                      'branch' => $this->input->post('branch')
                )
                );


            if ($res1 === true) {
                //$data['submitted'] = 'Successfully registered';
                redirect("profile");  
            } else {
                $data['submitted'] = $res1;
             
                $data['suggested_username']	=$this->confirm_model->get_suggested_username($data['user_id']);
                $data['college']=$this->profile_model->get_college($data['user_id']);
               redirect("auth/confirm",$this->session->set_flashdata('danger',$res1));  
            }
         
			
        }
    
}

}

/* End of file confirm.php */
/* Location: ./application/modules/auth/controllers/confirm.php */