<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->library('session');
        $this->load->model('tank_auth/users');       
        $this->load->model('profile_model');  
        $this->load->library('form_validation');
        $this->load->model('auth/confirm_model');   

        if (!$this->tank_auth->is_logged_in()){ 
          redirect('/auth/login/');
        }    

         
    }


    public function index()
    {    
            $data['current_section']="profile";
            $data['user_id']    = $this->tank_auth->get_user_id();
            $data['username']   = $this->tank_auth->get_username();
            $temp=$this->get_profilepicture($data['user_id']);
            $data['profile_image']=$temp['profile_image'];      
            $data['basic_info']=$this->profile_model->get_details($data['user_id']);
            $data['colleges']=$this->confirm_model->get_colleges(); 
            $this->_render_page("profile",$data);  
            //echo $this->session->userdata('user_id');
        
    }

   public function get_profilepicture($user_id){

        $profile_pic=$this->profile_model->get_name_profilepic($user_id);
         if(strncmp('http',$profile_pic['profile_image'],4)==0){
          $data['profile_image']=$profile_pic['profile_image'];
         }
         else{
          $data['profile_image'] =asset_url()."uploads/profile_pics/".$profile_pic['profile_image']; 
         }

    return $data;

  }




    public function update_basic_info()
    {
        
        $stat['status'] = "Basic info Updation failed";
        $this->load->model('profile_model');

        $basic_info = json_decode($this->input->post('basic_info'));
        if($this->profile_model->basicinfo_update($this->tank_auth->get_user_id(),$basic_info,'users'))
          { $stat['status']="Basic info Updated Sucessfully";
           // $stat['result']=$basic_info;

          }
          //redirect('Profile','refresh');
      echo json_encode($stat);

}




public function upload_photo(){
    $this->load->model('profile_model');
    $path = 'assets/uploads/profile_pics/';       
    $config['upload_path'] =$path;
    $config['allowed_types'] ='gif|jpg|png';
    $config['overwrite'] = TRUE;
    $config['max_size'] ='1500';
    $ext = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
    $config['file_name']=$this->tank_auth->get_user_id().'_'.$this->tank_auth->get_username().'.'.$ext;
        //chmod($config['upload_path'], 777);
    $stat="";$msg="";
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('files'))
    {
       
        $stat = $this->upload->display_errors('', '');
        redirect('profile',$this->session->set_flashdata('danger',$stat));
    }
    else
    {   $this->profile_model->update_profile_pic($this->tank_auth->get_user_id(),$this->tank_auth->get_username(),$ext);
        $data = $this->upload->data();
        redirect('profile','refresh');
        
    }

    
   // echo json_encode(array('status' => $status, 'msg' => $msg));
}
function viewProfile($others_userid){

   $data['current_section']="profile"; 
   $data['user_id']    = $this->tank_auth->get_user_id();
//   $this->profile_model->increase_profilevisit($others_userid,$data['user_id']) ;
   $data['username']   = $this->tank_auth->get_username();
   $temp=$this->get_profilepicture($data['user_id']);
   $data['profile_image']=$temp['profile_image'];      
   $data['basic_info']=$this->profile_model->get_details($data['user_id']);
   // $data['basic_info']['profile_image']="no_pic.jpg";  
   $others_info=$this->profile_model->get_details($others_userid) ;

   if($others_info !=false && (strncmp('http',$others_info['profile_image'],4)!=0)){
             $others_info['profile_image']=asset_url()."uploads/profile_pics/". $others_info['profile_image']; 
      }
            
   $data['others_info'] = $others_info; 

 
if($others_info !=false)
   $this->_render_page("viewProfile",$data);
 else
   $this->_render_page("viewProfileError",$data);
 
  

   

}



function liveSearch(){
   $data['current_section']="profile";
   $this->load->model('profile_model');         
   $live_srch=$this->profile_model->liveSearch_people($this->input->post('searchid')) ;
   $det['liveresult'] = $live_srch; 
   echo json_encode($det); 
         //print_r($live_srch);
        // $this->_render_page("viewProfile",$data);
}



function _render_page($view, $data=null, $render=false)
{
    $view_html = array( 
        $this->load->view('base/header', $data, $render),           
        //$this->load->view('base/sidenavbar', $data, $render),
        $this->load->view($view, $data, $render),                       
        $this->load->view('base/footer', $data, $render)
        );
    if (!$render) return $view_html;
}
}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */