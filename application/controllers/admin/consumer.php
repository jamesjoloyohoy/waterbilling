<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class consumer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
	}

	function load_admin_view($content, $data)
	{
		$data['content'] = $content;
		$this->load->view('admin/template/layout', $data);
	}

	public function index()
	{
		$data['consumer'] = $this->admin_model->get_consumer();
		$data['consumerdis'] = $this->admin_model->get_consumerDis();
		$data['zone'] = $this->admin_model->get_zone();
		$data['barangay'] = $this->admin_model->get_barangay();
		$this->load_admin_view('consumer' , $data);
		
	}

	public function disconnect($id)
	{
		$this->admin_model->disconnect($id);
		redirect('admin/consumer');
	}

	public function connect($id)
	{
		$this->admin_model->connect($id);
		redirect('admin/consumer');
	}

	public function add_new_consumer()
	{
		$cdata = array(
			'Cons_faName'				=>	$this->input->post('faname'),
			'Cons_fName'				=>	$this->input->post('fname'),
			'Cons_mName'				=>	$this->input->post('mname'),
			'Cons_zone'					=>	$this->input->post('zone'),
			'Cons_barangay'				=>	$this->input->post('barangay'),
			'Cons_province'				=>	$this->input->post('province'),
			'Cons_spouse'				=>	$this->input->post('spouse'),
			'Cons_dApplied'				=>	$this->input->post('dapplied'),
			'Cons_status'				=>	$this->input->post('status'),
			'Cons_serviceFee'			=>	$this->input->post('serviceFee'),
			'Cons_otherFee'				=>	$this->input->post('otherFee'),
			'fee_Fee_no'				=>	$this->input->post('fee_no')
		);

		$consumer = $this->admin_model->add_consumer($cdata);

		$meter = array(
			'Mtr_id'					=> $this->input->post('id'),
			'Mtr_size'					=> $this->input->post('size'),
			'Mtr_status'				=> $this->input->post('mstatus'),
			'consumer_Cons_no'			=> $consumer
		);

		$res = $this->admin_model->add_meter($meter);
		$data['consumer'] = $this->admin_model->get_meter();
		
		redirect('admin/consumer');
	}

	public function update_consumer()
	{
		$data = array(
			'Cons_faName'				=>	$this->input->post('ufaname'),
			'Cons_fName'				=>	$this->input->post('ufname'),
			'Cons_mName'				=>	$this->input->post('umname'),
			'Cons_zone'					=>	$this->input->post('uzone'),
			'Cons_barangay'				=>	$this->input->post('ubarangay'),
			'Cons_province'				=>	$this->input->post('uprovince'),
			'Cons_spouse'				=>	$this->input->post('uspouse'),
			'Cons_dApplied'				=>	$this->input->post('udapplied'),
			'Cons_status'				=>	$this->input->post('ustatus'),
			'Cons_serviceFee'			=>	$this->input->post('uservice'),
			'Cons_otherFee'				=>	$this->input->post('uother'),
			'fee_Fee_no'				=>	$this->input->post('ufee')
		);

		$this->admin_model->update_consumerInfo($this->input->post('Cons_no'), $data) == true;
		redirect('admin/consumer');
	}

	public function get_consumerInfo($id)
	{
		$data['info'] = $this->admin_model->get_ConsumerInfo($id);
		$this->load->view('admin/view_consumer', $data);
	}
}
