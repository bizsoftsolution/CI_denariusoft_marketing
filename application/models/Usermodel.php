<?php

class Usermodel extends CI_Model{

public function login($email,$password)
{
	$this->db->select('*');
	$this->db->from('user t1');
		$this->db->join('tbl_employee t2', 't1.emp_no = t2.id');
	$this->db->where('t1.email',$email);
	$this->db->where('t1.password',$password);
	$query=$this->db->get();
	$row_count=$query->num_rows();
	//var_dump($email.'-'.$password.'-'.$row_count);exit();
		if($row_count>0){
			$userdata=$query->row();
			$newdata = array(
				'user_id'  => $userdata->user_id,
				'user_type' => $userdata->user_type,
				'first_name' => $userdata->first_name,
				'last_name' => $userdata->last_name,
				'middle_name' => $userdata->middle_name,
				'email'     => $userdata->email,
				'emp_no'		=>$userdata->emp_no,
				'password'     => $userdata->password,
				'photo'		=>$userdata->photo,
				'logged_in' => "TRUE"
				);
			$this->session->set_userdata($newdata);
			$this->setLoginTime($userdata->user_id);
			return true;
            //return $newdata;
		}
	return false;
}
public function loginapi($email,$password)
{
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where('email',$email);
	$this->db->where('password',$password);
	$query=$this->db->get();
	$row_count=$query->num_rows();
	//var_dump($email.'-'.$password.'-'.$row_count);exit();
		if($row_count>0){
			 $userdata=$query->row();
			$newdata = array(
				'user_id'  => $userdata->user_id,
				'user_type' => $userdata->user_type,
				'first_name' => $userdata->first_name,
				'last_name' => $userdata->last_name,
				'middle_name' => $userdata->middle_name,
				'email'     => $userdata->email,
//				'password'     => $userdata->password,
				'logged_in' => "TRUE",
				'login_permission'=>"GRANTED"
				);
//			return $this->session->set_userdata($newdata);
			return json_encode($newdata);
// return true;
		} else {
					$newdata = array(
				'user_id'  => '',
				'user_type' => '',
				'first_name' => '',
				'last_name' => '',
				'middle_name' => '',
				'email'     => '',
//				'password'     => $userdata->password,
				'logged_in' => "FALSE",
				'login_permission'=>"DENIED"
				);

	return json_encode($newdata);
	}
}



public function logout($user_id){
$data['logged_in']="FALSE";
$this->db->where('user_id',$user_id);
$this->db->update('user',$data);
$newdata = array(
'user_id'   => '',
'email'     => '',
'user_type' => '',
'first_name' => '',
'last_name' => '',
'middle_name' => '',
'password'     => '',
'logged_in' => "FALSE"
);
$this->session->set_userdata($newdata);

}
public function userregister($data){
$this->load->database();
if($this->db->insert('user', $data))
	return true;
else
	return false;
}

public function setLoginTime($user_id){
$data['last_login']=date("Y-m-d H:i:s");
$data['logged_in']="TRUE";
$this->db->where('user_id',$user_id);
$this->db->update('user',$data);
}

}
