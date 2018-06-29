<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
public function __construct()
{
parent::__construct();
$this->load->model('Profile_model','employee');
    }

    public function index()
    {
      $this->load->library('session');
    	$this->load->helper('url');
      if ($this->session->userdata('first_name')!=null) {
    	   if($this->session->userdata('user_id')!=''){
        $emp_no = $this->session->userdata('emp_no');
        $result['EmployeeList']=$this->employee->selectemployee($emp_no);
        $result['branchList']=$this->employee->selectbranch();
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/sidebar');
        $this->load->view('profile_view',$result);
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

    public function profile_edit($id)
    {
        $data = $this->employee->get_by_id($id);
        $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function employee_update()
    {
        $this->_validate();
        $data = array(
              'ename' => $this->input->post('name'),
              'dob' => $this->input->post('dob'),
              'designation' => $this->input->post('designation'),
              'street1' => $this->input->post('street1'),
              'street2' => $this->input->post('street2'),
              'city' => $this->input->post('city'),
              'state' => $this->input->post('state'),
              'country' => $this->input->post('country'),
              'phone_number' => $this->input->post('phone_number'),
              'email' => $this->input->post('email')
            );

        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('upload/'.$this->input->post('remove_photo'));
            $data['photo'] = '';
        }

        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();

            //delete file
            $employee = $this->employee->get_by_id($this->input->post('id'));
            if(file_exists('upload/'.$employee->photo) && $employee->photo)
                unlink('upload/'.$employee->photo);

            $data['photo'] = $upload;
        }

        $data_user = array(
          'first_name' => $this->input->post('name'),
          'user_type' => $this->input->post('designation'),
          'email' => $this->input->post('email'),
          'password' => $this->input->post('password')

        );


        $this->employee->update(array('id' => $this->input->post('id')), $data, $data_user,array('emp_no' => $this->input->post('id')));
        echo json_encode(array("status" => TRUE));
    }

    private function _do_upload() {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'EmployeeName is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('designation') == '')
        {
            $data['inputerror'][] = 'designation';
            $data['error_string'][] = 'Please select Designation';
            $data['status'] = FALSE;
        }

        if($this->input->post('state') == '')
        {
            $data['inputerror'][] = 'state';
            $data['error_string'][] = 'state is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('country') == '')
        {
            $data['inputerror'][] = 'country';
            $data['error_string'][] = 'country is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}
