<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChangePassword extends CI_Controller

{
  public function __construct()
    {
    parent::__construct();
    $this->load->model('ChangePasswordModel', 'cpjModel',TRUE);
    }

  public function index()
    {
    $this->load->library('session');
    $this->load->helper('url');
    if ($this->session->userdata('first_name') != null)
      {
      if ($this->session->userdata('user_id') != '')
        {
      //  $result['empList']=$this->cpjModel->selectEmployee();
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/sidebar');
        $this->load->view('change_password');
        $this->load->view('adminpanel/footer');
        }
        else
        {
        redirect('Login');
        }
      }
      else
      {
      redirect('Login');
      }
    }
    public function pwd_save()
  	 {
       //echo "hiiiii";exit();
       $old= $this->input->post('old_password');
       $new = array(
               'password' => $this->input->post('new_password'),
           );
           //var_dump($data);exit();

       //$new= $this->input->post('new_password');
       $emp_no= $this->input->post('emp_no');
       $this->cpjModel->pwd_save($old,$new,$emp_no);
  		 echo json_encode(array("status" => TRUE));
  	 }
}
