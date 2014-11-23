<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//$this->tables = $this->config->item('tables','_config');
	}
   
    public function get_credits($user_id){
    	$this->db->select()->from('credits')->where('user_id',$user_id);
    	$query = $this->db->get();	
	    $res= $query->row_array();    
	    $total=$res['first_login']+$res['resume']+$res['questions']+$res['answers']+$res['estore']+$res['tnp_reviews'];
	    return $total; 

    }

    public function increase_profilevisit($visited_id,$visiter_id){  
        $this->db->select()->from('profile_visitors')->where(array('user_id' =>$visited_id ,'visiter_id'=>$visiter_id ));
        $query = $this->db->get();
		if ($query->num_rows() == 0){
			$this->db->insert('profile_visitors',array('user_id' =>$visited_id ,'visiter_id'=>$visiter_id ));
			$this->db->set('visits' , 'visits+1',FALSE)->where(array('user_id' => $visited_id))->update('user_profiles');	

          }
		
	}

	public function get_details($user_id){
		$this->db->select()->where('id',$user_id)->from('users')->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return false;
		}
	}
 public function get_myquote($user_id){
        $this->db->select('quote')->from('quotes')->where("user_id",$user_id);
   		$query = $this->db->get();
   		if($query->num_rows()>0)	
	      return $query->first_row()->quote;
	    else
	      return "Add your quote here by clicking edit";

}

 public function get_othersquote($user_id){
        $this->db->select('quote')->from('quotes')->where("user_id",$user_id);
   		$query = $this->db->get();
   		if($query->num_rows()>0)	
	      return $query->first_row()->quote;
	    else
	      return "Add your quote here by clicking edit";

}

public function quote_update($user_id,$details,$table_name){ 
        $this->db->select()->from($table_name)->where('user_id',$user_id);
        $query = $this->db->get();
   		if($query->num_rows()==0){
   			$this->db->insert($table_name,$details);
   		}
   		else{
   			$this->db->update($table_name, $details, array('user_id' => $user_id));
   		}

	    if ($this->db->affected_rows() > 0) {
			   return true;
		}
		return false;
	}


   public function get_college($user_id){
   		$this->db->select('college')->from('colleges')->join('users','colleges.college_code=users.college_code');
   		$query = $this->db->get();	
	    $res= $query->row_array();
	      return $res['college'];

   }
	public function get_name_profilepic($user_id){

		$this->db->select('firstname,lastname,profile_image')->from('users')->where('id',$user_id)->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return false;
		}
	}
public function get_recently_addedusers(){
	$this->db->select('user_id,firstname,lastname,branch,course,profile_image')->from('users')->where('reg_number !=','')->limit('50')
	->join('user_profiles','users.id=user_profiles.user_id')->order_by('created','Desc');
		$query = $this->db->get()->result_array();    
     
       foreach ($query as $key => $value) {
       	   
		       if(strncmp('http',$value['profile_image'],4)==0){
		         	$query[$key]['profile_image']=$value['profile_image'];
		         }
		         else{
		         	$query[$key]['profile_image'] =asset_url()."uploads/profile_pics/".$value['profile_image']; 

		         }	
       }
	
	return $query;
		
}

public function get_trending_users(){
	$this->db->select('user_id,firstname,lastname,branch,course,profile_image')->from('users')->where('reg_number !=','')->limit('25')
	->join('user_profiles','users.id=user_profiles.user_id')->order_by('last_login','Desc');
		$query = $this->db->get()->result_array();    
     
       foreach ($query as $key => $value) {
       	   
		       if(strncmp('http',$value['profile_image'],4)==0){
		         	$query[$key]['profile_image']=$value['profile_image'];
		         }
		         else{
		         	$query[$key]['profile_image'] =asset_url()."uploads/profile_pics/".$value['profile_image']; 
		         	
		         }	
       }
	
	return $query;
		
}


	public function liveSearch_people($searchid){
		$this->db->select('id,firstname,email,profile_image')->from('users')->like('firstname',$searchid)->limit(5);
		$query = $this->db->get()->result_array();    
     
       foreach ($query as $key => $value) {
       	   
		       if(strncmp('http',$value['profile_image'],4)==0){
		         	$query[$key]['profile_image']=$value['profile_image'];
		         }
		         else{
		         	$query[$key]['profile_image'] =asset_url()."uploads/profile_pics/".$value['profile_image']; 

		         }	
       }
	
	return $query;

	}

	public function get_moreinfo($user_id){
		$this->db->select()->from('user_moreinfo')->where('user_id',$user_id)->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return false;
		}

	}

	public function basicinfo_update($user_id,$details,$table_name)
	{   //$email_det=$details['email'];	    
		$this->db->update($table_name, $details, array('id' => $user_id));
		if ($this->db->affected_rows() > 0) {
			  //$this->db->update('users', $email_det, array('id' => $user_id));
			   //if ($this->db->affected_rows() >0) 
			          return true;
		}
		return false;
	}

  
    
  
	public function activity_update($user_id,$details,$table_name)
	{  
		$query = $this->db->update($table_name, $details, array('user_id' => $user_id));
		if ($this->db->affected_rows() >= 0) {
			//$this->db->update('users', array('profile_edited' => 1), array('user_id' => $user_id));
			if ($this->db->affected_rows() >= 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function update_profile_pic($user_id,$username,$ext){

		$x['profile_image']= $user_id.'_'.$username.'.'.$ext;
		if( $this->db->update('users',$x,array('id' => $user_id)))
			return $user_id.'_'.$username.'.'.$ext;
		else
			return false;
	}
	
	public function profile_edited($user_id)
	{
		$this->db->select('')->from('student_auth')->where(array('user_id' => $user_id, 'profile_edited' => 1))->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() === 1) {
			return true;
		} else {
			return false;
		}
	}

	public function _updateProjects($user_id,$details,$table_name){
		$query = $this->db->update($table_name, $details, array('user_id' => $user_id));
		if ($this->db->affected_rows() >= 0) {
			//$this->db->update('student_', array('profile_edited' => 1), array('user_id' => $user_id));
			if ($this->db->affected_rows() >= 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	//ViewProfile 

	public function get_taps_data($user_id){
		$this->db->select('training_placement.*,firstname,lastname,profile_image,branch,course')->from('training_placement')->order_by('timestamp','desc')
		          ->join('users','training_placement.user_id=users.id')
		          ->join('user_profiles','training_placement.user_id=user_profiles.user_id')->where('training_placement.user_id',$user_id);
		 
		 $query = $this->db->get();		
			return $query->result_array();   
	}

	public function get_blogs_data($user_id){
         $this->db->select('blogs.*,users.firstname,users.profile_image')->from('blogs')->join('users','users.id = blogs.userid')->where('blogs.userid',$user_id);
        $query =  $this->db->get();
         if($query->num_rows()>0){			
			return $query->result_array();
		}
		else {
			return false;
		}
	}

	public function get_questions_data($user_id){
		
		$this->db->select('qid,question,profile_image,id as user_id,firstname,lastname,questions.timestamp,rating')->from('questions')
		->join('users','users.id=questions.asker_id')->order_by('timestamp','DESC')->where('asker_id',$user_id);

		
			
		
          
	        $query = $this->db->get();		
			return $query->result_array();
	

	}

	public function get_added_items($user_id){
 	$this->db->select()->from('estore_items')->where(array('seller_id' => $user_id ))
  ->join('estore_categories','estore_categories.cat_id=estore_items.cat_id');
  $query = $this->db->get();	
  return $query->result_array();

}

public function get_question_answers(){
		$this->db->select('answers_data.*,firstname,lastname')->from('answers_data')->join('users','users.id = answers_data.user_id');
		$query = $this->db->get();
		// $firephp->log($query->result_array());
		if ($query->num_rows()> 0) {
			
			return $query->result_array();
		} else {
			return false;
		}
	}


	


}

/* End of file profile_model.php */
/* Location: ./application/modules/profile/models/profile_model.php */