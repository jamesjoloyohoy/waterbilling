<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_reading extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('staff_model');
		$this->load->model('cashier_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
	}

	function load_staff_view($content , $data)
	{
		$data['content'] = $content;
		$this->load->view('staff/template/layout', $data);
	}

	public function index()
	{
		$Mtr_id = $this->staff_model->get_meters($this->input->post('Mtr_id'));
		if($Mtr_id === null){
			$this->session->userdata('success', 'Error!, No Meter Found');
			redirect('staff/dashboard');
		} else {
			$Read_no = $this->cashier_model->get_latest_trans($this->input->post('Mtr_id'));
			$data['cubic'] = $this->staff_model->get_maxCubic();
			$data['consumer'] = $this->staff_model->get_meters($this->input->post('Mtr_id'));
			$data['consumers'] = $this->staff_model->get_meter($this->input->post('Mtr_id'), $Read_no);

			$this->load_staff_view('add_reading' , $data);
		}
		
	}

	public function add_reading()
	{
		$bill_arr = array(
			'Bill_date' 		=> $this->input->post('bdate'),
			'Bill_startDate' 	=> $this->input->post('sdate'),	
			'Bill_endDate' 		=> $this->input->post('edate'),
			'Bill_dueDate' 		=> $this->input->post('ddate')
		);

		$rate_arr = array(
			'Rate_prevUsage' 	=> $this->input->post('pusage'),
			'Rate_currUsage' 	=> $this->input->post('cusage'),
			'Rate_totalUsage' 	=> $this->input->post('tusage')
        );
        
		$bill = $this->staff_model->add_bill($bill_arr);
		$rate = $this->staff_model->add_rate($rate_arr);

		$read_arr = array(
			'Read_date' 		=> $this->input->post('rdate'),
			'Read_prevBill' 	=> $this->input->post('pbill'),
            'Read_currBill' 	=> $this->input->post('cbill'),
			'Read_meterUsed' 	=> $this->input->post('meterUsed'),
			'Read_meterReader'	=> $this->input->post('read'),
			'Read_numOfRead'	=> $this->input->post('numofread'),
			'Meter_Mtr_no'		=> $this->input->post('no'),
            'bill_Bill_no'		=> $bill,
			'rate_Rate_no'		=> $rate,
			'Cubic_Cubic_no'	=> $this->input->post('cubic')
		);
		
		$res = $this->staff_model->add_reading($read_arr);
		$data['reading'] = $this->staff_model->get_reading();
		
		redirect('staff/dashboard');
	}
}
