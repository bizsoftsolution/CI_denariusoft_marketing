<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->database();
        $this->load->model('Usermodel');
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");


    }

		//Method for view login page
		public function index(){
		$this->load->library('session');
				$this->load->helper('url');
	    if($this->session->userdata('logged_in')==TRUE){
        redirect('Dashboard');
        }
        $data=array();
		$this->load->view('Login');
	   }

	   //Method for varify login information
	   public function varifyUser(){
	   $this->load->library('session');
	   		$this->load->helper('url');
        /* if($this->session->userdata('logged_in')==TRUE){
        redirect('Dashboard');
        }  */
        $email=$this->input->post('email',true);
        $password=$this->input->post('password',true);
        if($this->Usermodel->login($email,$password)){
        redirect('Dashboard');
        }else{
        redirect('Login');
        }

	   }

	   public function verify(){
//		$this->load->library('session');
		$this->load->helper('url');
        $email1=$this->input->post('email',true);
		$email = urldecode($email1);
        $password=$this->input->post('password',true);

		echo $this->Usermodel->loginapi($email,$password);

		/*
		//$this->Usermodel->login_api($email,$password);
         if($this->Usermodel->loginapi($email,$password)){

		echo $this->session->userdata('user_type');
		// echo "SUCCESS";
		}
		else {
        echo "FAILED";
        }
		*/

        }



	   //Method for logout
	   public function logout(){
	   $this->load->library('session');

	   	$this->Usermodel->logout($this->session->userdata('user_id'));
	   redirect('Login');
	   }


}
