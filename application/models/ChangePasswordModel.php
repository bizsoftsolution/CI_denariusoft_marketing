
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChangePasswordModel extends CI_Model

	{

	public function __construct()
		{
		parent::__construct();
		$this->load->database();
		}
public function pwd_save($old,$new,$emp_no)
{
  $this->db->where('password',$old);
  if($this->db->from('user'))
  {

    $this->db->where('emp_no',$emp_no);

    $this->db->update('user',$new);
    return $this->db->affected_rows();
  }
}
}
