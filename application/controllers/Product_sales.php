<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product_Sales extends CI_Controller
{
public function __construct()
{
parent::__construct();
$this->load->model('ProductSale_model','PSModel');
$this->load->library('session');
    }

    public function index()
    {
      $this->load->library('session');
    	$this->load->helper('url');
      if ($this->session->userdata('first_name')!=null) {
    	   if($this->session->userdata('user_id')!=''){

       $result['productList']=$this->PSModel->selectproduct();
        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/sidebar');
        $this->load->view('product_sale_view',$result);
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

    public function product_list()
    {

        $this->load->helper('url');
		$emp_no=$this->session->userdata('emp_no');
        $list = $this->PSModel->get_datatables($emp_no);
        //echo $list;
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $product_sale) {
            $no++;
            $row = array();
            $row[] = $product_sale->product_name;
            $row[] = $product_sale->buyer_company;
            $row[] = $product_sale->contact_person;
            $row[] = $product_sale->phone_number;
            $row[] = $product_sale->email;
            $row[] = $product_sale->mode_of_payment;
            $row[] = $product_sale->insert_date;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_sale('."'".$product_sale->product_sale_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Delete" onclick="delete_sale('."'".$product_sale->product_sale_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }
        //console.log($data);

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->PSModel->count_all(),
                        "recordsFiltered" => $this->PSModel->count_filtered($emp_no),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function product_edit($product_sale_id)
    {
        $data = $this->PSModel->get_by_id($product_sale_id);
        //$data->insert_date = ($data->insert_date == '0000-00-00') ? '' : $data->insert_date; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function product_add()
    {
        $this->_validate();

        $data = array(
                'product_id' => $this->input->post('product_id'),
                'buyer_company' => $this->input->post('buyer_company'),
                'contact_person' => $this->input->post('contact_person'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'mode_of_payment' => $this->input->post('mode_of_payment'),
                'insert_date' => $this->input->post('insert_date'),
                'emp_no'=>$this->session->userdata('emp_no')
            );

        $insert = $this->PSModel->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function product_update()
    {
        $this->_validate();
        $data = array(
                'product_id' => $this->input->post('product_id'),
                'buyer_company' => $this->input->post('buyer_company'),
                'contact_person' => $this->input->post('contact_person'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'mode_of_payment' => $this->input->post('mode_of_payment'),
                'insert_date' => $this->input->post('insert_date')
            );

        $this->PSModel->update(array('product_sale_id' => $this->input->post('product_sale_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function product_delete($product_sale_id)
    {
        //delete file
        $product_sale = $this->PSModel->get_by_id($product_sale_id);
        $this->PSModel->delete_by_id($product_sale_id);
        echo json_encode(array("status" => TRUE));
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('buyer_company') == '')
        {
            $data['inputerror'][] = 'buyer_company';
            $data['error_string'][] = 'BuyerCompany is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('contact_person') == '')
        {
            $data['inputerror'][] = 'contact_person';
            $data['error_string'][] = 'Contact Person is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('phone_number') == '')
        {
            $data['inputerror'][] = 'phone_number';
            $data['error_string'][] = 'Phone Number is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

      
	  if($this->input->post('mode_of_payment') == '')
        {
            $data['inputerror'][] = 'mode_of_payment';
            $data['error_string'][] = 'Please Select Payment Mode';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
    public function approve_product()
    {
      $this->load->library('session');
    	$this->load->helper('url');
      if ($this->session->userdata('first_name')!=null) {
    	   if($this->session->userdata('user_id')!=''){


        $this->load->view('adminpanel/header');
        $this->load->view('adminpanel/sidebar');
        $this->load->view('product_sale_approve_view');
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

    public function approve_product_list()
    {

        $this->load->helper('url');

        $list = $this->PSModel->get_datatables_approve();
        //echo $list;
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $product_sale) {
            $no++;
            $row = array();

			$row[] = $product_sale->ename;
			$row[] = $product_sale->product_name;
            $row[] = $product_sale->buyer_company;
            $row[] = $product_sale->contact_person;
            $row[] = $product_sale->phone_number;
            $row[] = $product_sale->email;
            $row[] = $product_sale->mode_of_payment;
            $row[] = $product_sale->insert_date;


            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Approve" onclick="approve_sale('."'".$product_sale->product_sale_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';

            $data[] = $row;
        }
        //console.log($data);

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->PSModel->count_all(),
                        "recordsFiltered" => $this->PSModel->count_filtered_approve(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function approve_product_update()
    {
        $this->_validate();
        $data = array(
                'product_id' => $this->input->post('product_id'),
                'buyer_company' => $this->input->post('buyer_company'),
                'contact_person' => $this->input->post('contact_person'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'mode_of_payment' => $this->input->post('mode_of_payment'),
                'insert_date' => $this->input->post('insert_date'),
				'serial_number' => $this->input->post('serial_number'),
                'status' => 'CLOSED'
            );
			//var_dump($data);exit();
        $this->PSModel->approve_update(array('product_sale_id' => $this->input->post('product_sale_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function product_edit_approve($product_sale_id)
    {
        $data = $this->PSModel->get_by_id_approve($product_sale_id);
		//var_dump();e
        $data->insert_date = ($data->insert_date == '0000-00-00') ? '' : $data->insert_date; // if 0000-00-00 set tu empty for datepicker compatibility
       echo json_encode($data);
    }
}
