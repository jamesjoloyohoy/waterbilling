<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		// $this->load->model('admin_model');
		$this->load->model('cashier_model');
		$this->load->model('staff_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
    }
    
	public function index()
	{
		$this->load->view('admin/notice');
	}

	public function get_notPaid($Mtr_id)
	{
		$Bill_no = $this->cashier_model->ifPaid_checks($Mtr_id);
		$paidBillNo = $this->cashier_model->ifPaids($Mtr_id, $Bill_no);
		
		$data['consumerInfo'] = $this->staff_model->readConsumers($Mtr_id);
		$data['record'] = $this->cashier_model->get_records($Mtr_id, $paidBillNo);
		$data['cubic'] = $this->staff_model->get_maxCubic();
		$this->load->view('admin/notice', $data);
	}
}
