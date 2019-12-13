<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class receipt extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('cashier_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
	}

	function load_cashier_view($content, $data)
	{
		$data['content'] = $content;
		$this->load->view('cashier/template/layout', $data);
	}

	public function index()
	{
		// $Mtr_id = $this->staff_model->get_meters($this->input->post('Mtr_id'));
		// if($Mtr_id === null){
		// 	$this->session->set_flashdata('error', 'Error! No Meter Found');
		// 	redirect('cashier/dashboard');
		// }
		// else
		// {
			// $Read_no = $this->cashier_model->get_latest_trans($this->input->post('Mtr_id'));
			// $data['reading'] = $this->cashier_model->get_meter($this->input->post('Mtr_id'), $Read_no);
			// $data['readings'] = $this->cashier_model->get_meters($this->input->post('Mtr_id'));
			// $data['max'] = $this->cashier_model->get_max($this->input->post('Mtr_id'));
		// }
		// $Bill_no = $this->cashier_model->ifPaid_check($this->input->post('Mtr_id'));
		// $paidBillNo = $this->cashier_model->ifPaid($this->input->post('Mtr_id'), $Bill_no);
		// if ($paidBillNo == null) {
		// 	$this->session->set_flashdata('error', 'Ether no Meter Found or Meter Have No Balance!');
		// 	redirect('cashier/dashboard');
		// } else {
			// $data['consumerInfo'] = $this->staff_model->readConsumer($this->input->post('Mtr_id'));
			// $data['record'] = $this->cashier_model->get_record($this->input->post('Mtr_id'), $paidBillNo);
			// $data['maxRead'] = $this->cashier_model->get_maxReading($this->input->post('Mtr_id'));
			// 
			// $data['cubic'] = $this->staff_model->get_maxCubic();

		// }

			$Mtr_id = $this->input->post('Mtr_id');

			$Bill_no = $this->cashier_model->ifPaid_check($Mtr_id);
			$paidBillNo = $this->cashier_model->ifPaid($Mtr_id, $Bill_no);

			if($paidBillNo == null){
				$this->session->set_flashdata('error', 'Either no Meter Found or Meter Have No Balance!');
				redirect('cashier/dashboard');
			} else{
				$data['record'] = $this->cashier_model->get_record($Mtr_id, $paidBillNo);
				// $data['max'] = $this->cashier_model->get_max($Mtr_id);
				$data['consumerInfo'] = $this->cashier_model->readConsumer($Mtr_id);
				$this->load_cashier_view('receipt' , $data);
			}
	}

	

	// public function add_transaction()
	// {
	// 	$trans_arr = array(
	// 		'Trans_amount'		=>	$this->input->post('amount'),
	// 		'Employee_Emp_no'	=>	$this->input->post('emp_no'),
	// 		'bill_bill_no'		=>	$this->input->post('bill_no')
	// 	);

	// 	$res = $this->cashier_model->add_transaction($trans_arr);
	// 	$data['trans_det'] = $this->cashier_model->get_trans_det();
	
	// 	echo json_encode($data);
	// }

	public function add_transaction()
	{
		$trans_num = $this->input->post('bill_no[]');

		$transac = array();

		for($i = 0; $i < count($trans_num); $i++)
		{
			$transac[] = array(
				'Employee_Emp_no'		=> $this->input->post('emp_no'),
				'bill_bill_no'			=> $trans_num[$i]
			);
		}

		$res = $this->cashier_model->add_transaction($transac);
		$data['transaction'] = $this->cashier_model->get_trans();

		echo json_encode($data);
	}
}
