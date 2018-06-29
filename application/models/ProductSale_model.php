<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductSale_model extends CI_Model {

	var $table = 'tbl_mk_product_sale';
	var $column_order = array('product_id','buyer_company','contact_person','phone_number','email','mode_of_payment','insert_date',null); //set column field database for datatable orderable
	var $column_search = array('buyer_company','contact_person','phone_number','email','mode_of_payment','insert_date'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('product_sale_id' => 'desc'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($emp_no)
	{
//		$this->db->from($this->table);
                $this->db->select('*');
                $this->db->from('tbl_mk_product_sale t');
//                $this->db->join('tbl_employee e', 't.emp_no = e.id','left');
                $this->db->join('tbl_product p', 'p.product_id = t.product_id','left');
                $this->db->where('t.emp_no',$emp_no);

		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($emp_no)
	{
		$this->_get_datatables_query($emp_no);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($emp_no)
	{
		$this->_get_datatables_query($emp_no);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($product_sale_id)
	{
		$this->db->from($this->table);
		$this->db->where('product_sale_id',$product_sale_id);
		$query = $this->db->get();

		return $query->row();
	}
// ,$data_user
	public function save($data)
	{

		if($this->db->insert($this->table, $data))
		{

			return $this->db->insert_id();
		}
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
				return $this->db->affected_rows();
	}

	public function delete_by_id($product_sale_id)
	{
		$this->db->where('product_sale_id', $product_sale_id);
		$this->db->delete($this->table);
	}
	public function selectproduct(){
		$this->db->from('tbl_product');
		//$this->db->where(');
        $query = $this->db->get();
        return $query->result();
	}


//Group


	private function _get_datatables_query_approve()
	{
//		$this->db->from($this->table);
                $this->db->select('*');
                $this->db->from('tbl_mk_product_sale t');
                $this->db->join('tbl_employee e', 't.emp_no = e.id','left');
                $this->db->join('tbl_product p', 'p.product_id = t.product_id','left');
                $this->db->where('t.status','OPEN');

		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_approve()
	{
		$this->_get_datatables_query_approve();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_approve()
	{
		$this->_get_datatables_query_approve();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function approve_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
				return $this->db->affected_rows();

	}
	public function get_by_id_approve($product_sale_id)
	{
		//$this->db->from($this->table);
		//$this->db->where('product_sale_id',$product_sale_id);
                $this->db->select('*');
                $this->db->from('tbl_mk_product_sale t');
//                $this->db->join('tbl_employee e', 't.emp_no = e.id','left');
                $this->db->join('tbl_product p', 'p.product_id = t.product_id','left');
								$this->db->where('product_sale_id',$product_sale_id);



		$query = $this->db->get();

		return $query->row();
	}

}
