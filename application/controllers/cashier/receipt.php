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
		$Read_no = $this->cashier_model->get_latest_trans($this->input->post('Mtr_id'));
		$data['reading'] = $this->cashier_model->get_meter($this->input->post('Mtr_id'), $Read_no);
		$data['readings'] = $this->cashier_model->get_meters($this->input->post('Mtr_id'));
		$data['max'] = $this->cashier_model->get_max($this->input->post('Mtr_id'));

		$this->load_cashier_view('receipt', $data);
	}

	public function add_transaction()
	{
		$trans_arr = array
		(
			'Trans_amount'		=>	$this->input->post('amount'),
			'Employee_Emp_no'	=>	$this->input->post('emp_no'),
			'meter_Mtr_no'		=>	$this->input->post('mtr_no')
		);

		$trans = $this->cashier_model->add_transaction($trans_arr);

		$reading_num = $this->input->post('read_no[]');

		$trans_det = array();
		
		for ($i=0; $i < count($reading_num); $i++) { 
			$trans_det[] = array(
				'transaction_trans_no'	=> $trans,
				'reading_Read_no'		=> $reading_num[$i]
			);
		}

		$res = $this->cashier_model->add_trans_det($trans_det);
		$data['trans_det'] = $this->cashier_model->get_trans_det();

		redirect('cashier/dashboard');
	}
}
