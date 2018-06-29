<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{
public function __construct()
{
parent::__construct();
$this->load->model('Product_Model','product');
    }

    public function index()
    {
	$this->load->library('session');
	$this->load->helper('url');
  if ($this->session->userdata('first_name')!=null) {
	   if($this->session->userdata('user_id')!=''){

   			$this->load->view('adminpanel/header');
   			$this->load->view('adminpanel/sidebar');
   			$this->load->view('product_view');
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

    public function ajax_list()
    {

        $this->load->helper('url');

        $list = $this->product->get_datatables();
        //echo $list;
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $product) {
            $no++;
            $row = array();
            $row[] = $product->product_name;
            $row[] = $product->selling_price;
            $row[] = $product->commission;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_product('."'".$product->product_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Hapus" onclick="delete_product('."'".$product->product_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }
        //console.log($data);

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->product->count_all(),
                        "recordsFiltered" => $this->product->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($product_id)
    {
        $data = $this->product->get_by_id($product_id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        //$this->_validate();

        $data = array(
          'product_name' => $this->input->post('product_name'),
          'selling_price' => $this->input->post('selling_price'),
          'commission' => $this->input->post('commission'),
            );

          $insert = $this->product->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        // $this->_validate();
        $data = array(
                'product_name' => $this->input->post('product_name'),
                'selling_price' => $this->input->post('selling_price'),
                'commission' => $this->input->post('commission'),
                  );


            //delete file
            $product = $this->product->get_by_id($this->input->post('product_id'));


        $this->product->update(array('product_id' => $this->input->post('product_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($product_id)
    {
        //delete file
        $product = $this->product->get_by_id($product_id);

        $this->product->delete_by_id($product_id);
        echo json_encode(array("status" => TRUE));
    }

    private function _do_upload()
    {
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

        if($this->input->post('firstName') == '')
        {
            $data['inputerror'][] = 'firstName';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('lastName') == '')
        {
            $data['inputerror'][] = 'lastName';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('dob') == '')
        {
            $data['inputerror'][] = 'dob';
            $data['error_string'][] = 'Date of Birth is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('gender') == '')
        {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Please select gender';
            $data['status'] = FALSE;
        }

        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Addess is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}
