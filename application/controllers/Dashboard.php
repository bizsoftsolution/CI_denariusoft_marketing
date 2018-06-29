<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
public function __construct()
{
parent::__construct();

    }

    public function index()
    {
      $this->load->library('session');
    	$this->load->helper('url');
      if ($this->session->userdata('first_name')!=null) {
    	   if($this->session->userdata('user_id')!=''){

//       $result['branchList']=$this->employee->selectbranch();
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/sidebar');
        $this->load->view('dashboard');
        $this->load->view('adminpanel/footer');

        $this->load->view('adminpanel/footer');

	   }
	   else {

	   redirect('Login');
	   }
	}
	   else {
	   redirect('Login');
	   }


    }
}