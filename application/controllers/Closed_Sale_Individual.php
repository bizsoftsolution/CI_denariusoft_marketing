<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Closed_Sale_Individual extends CI_Controller
{
public function __construct()
{
parent::__construct();
$this->load->model('ClosedSaleIndividualModel','gsale');
$this->load->library('session');
    }

    public function index()
    {
	$this->load->library('session');
	$this->load->helper('url');
  if ($this->session->userdata('first_name')!=null) {
	   if($this->session->userdata('user_id')!=''){

   			$this->load->view('adminpanel/header');
   			$this->load->view('adminpanel/sidebar');
   			$this->load->view('individual_sale_view');
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
        $emp_no=$this->session->userdata('emp_no');
        $list = $this->gsale->get_datatables($emp_no);
        //echo $list;
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $product) {
            $no++;
            $row = array();

            $row[] = $product->product_name;
            $row[] = $product->selling_price;
            $row[] = $product->commission;
            $row[] = $product->buyer_company;
            $row[] = $product->insert_date;

            //add html for action
            $data[] = $row;
        }
        //console.log($data);

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->gsale->count_all(),
                        "recordsFiltered" => $this->gsale->count_filtered($emp_no),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}
