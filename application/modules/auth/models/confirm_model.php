<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Confirm_model extends CI_Model {

	public function reg_number_exists($user_id){      
		$this->db->select('reg_number,firstname')->from('users')->where(array('id' => $user_id))->limit(1);
		$query = $this->db->get();
		$res = $query->row_array();   
		if($res['reg_number']==""){ 	  		     
	             // $det['username']=$res['firstname'].$user_id;
              //    $this->db->update('users',$det,array('id' => $user_id));
			return false;
		}
		else
			return true;

	}



	public function  get_suggested_username($user_id){
		$this->db->select('firstname')->from('users')->where(array('id' => $user_id))->limit(1);
		$query = $this->db->get();
		$res = $query->row_array(); 
		return $res['firstname'].$user_id;  
	}

	public function get_details($user_id){
		$this->db->select('firstname,lastname,email')->from('users')->where('id',$user_id)->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function get_colleges(){
		$this->db->select()->from('colleges');
		$query = $this->db->get();		
		return $query->result_array();
		
	}

	public function update_users($user_id,$details)
	{   $stat1=0;$stat2=0;$msg="";
		$reg_number=$details['reg_number'];
	    $username=$details['username'];
        $this->db->select('reg_number')->from('users')->where('reg_number',$reg_number);
            $query = $this->db->get();
		    if ($query->num_rows() >0 )
			$stat1=1;
		    
		$this->db->select('username')->from('users')->where('username',$username);
             $query2= $this->db->get();
             if ($query2->num_rows() >0 )
             $stat2=1;             


		if($stat1!=1 && $stat2!=1){
		$this->db->update('users', $details, array('id' => $user_id));
				if ($this->db->affected_rows() > 0) 
			          { //$this->db->insert('credits',array('first_login' =>'25' ,'user_id' => $user_id) ) ;
			          	return true;
			          }
		}
		else{
			if($stat1==1)
				$msg="Reg number already exists";
			if($stat2==1)
				$msg="username already exists";
			if($stat1==1 && $stat2==1)
			  $msg="username and Reg number already exists";

		return $msg;
	   }
	}

	public function update_user_profiles($user_id,$details)
	{   
		$this->db->update('user_profiles', $details, array('user_id' => $user_id));
				if ($this->db->affected_rows() > 0) 
			          return true;
			      else 
			      	return false;
		
	}

	
}

/* End of file confirm_model.php */
/* Location: ./application/modules/auth/models/confirm_model.php */