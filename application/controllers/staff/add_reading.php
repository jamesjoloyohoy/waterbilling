<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_reading extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('staff_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
	}

	function load_staff_view($content, $data)
	{
		$data['content'] = $content;
		$this->load->view('staff/template/layout', $data);
	}

	public function index()
	{
		// $month = $this->getMonth(date('m'));
		// $year = date('Y');

		// if ($this->staff_model->get_noRead_mtrID($month, $year, $Mtr_id) != null) {
		// 	$this->session->set_flashdata('error', 'Already read this month!');
		// 	redirect('staff/dashboard');
		// }
		//  elseif ($this->staff_model->toBeDC($Mtr_id) != null) {
		// 	$this->session->set_flashdata('error', 'Meter Has Already 3 Number of Reading!');
		// 	redirect('staff/dashboard');
		// }
		//  elseif ($this->staff_model->readConsumer($Mtr_id) == null) {
		// 	$this->session->set_flashdata('error', 'Either No Meter was found or The Meter is disconnected!');
		// 	redirect('staff/dashboard');
		// } 
		
		$Mtr_id = $this->input->post('Mtr_id');
		$month = $this->getMonth(date('m'));
		$year = date('Y');

		if ($this->staff_model->get_noRead_mtrID($month, $year, $Mtr_id) != null) {
			$this->session->set_flashdata('error', 'Already read this month!');
			redirect('staff/dashboard');
		} elseif ($this->staff_model->readConsumer($Mtr_id) == null) {
			$this->session->set_flashdata('error', 'Either No Meter was found or The Meter is disconnected!');
			redirect('staff/dashboard');
		} 
		// elseif ($this->staff_model->toBeDC($Mtr_id) != null) {
		// 	$this->session->set_flashdata('error', 'Meter Has Already 3 Number of Reading!');
		// 	redirect('staff/dashboard');
		// }

		$Bill_no = $this->staff_model->ifPaid_check($Mtr_id);

		$data['consumerInfo'] = $this->staff_model->readConsumer($Mtr_id);
		$data['previousReading'] = $this->staff_model->get_previousReading($Mtr_id);
		$data['cubic'] = $this->staff_model->get_maxCubic();
		$data['consumerBill'] = $this->staff_model->readBill($Mtr_id, $Bill_no);
		
		$this->load_staff_view('add_reading' , $data);
		
	}

	public function add_reading()
	{
		$read_arr = array(
			'read_date' 		=> $this->input->post('bdate'),
			'read_startDate' 	=> $this->input->post('sdate'),	
			'read_endDate' 		=> $this->input->post('edate'),
			'read_dueDate' 		=> $this->input->post('ddate')
		);
        
		$read = $this->staff_model->add_read($read_arr);

		$bill_arr = array(
			'bill_date' 		=> $this->input->post('rdate'),
			'bill_prevBill' 	=> $this->input->post('pbill'),
            'bill_currBill' 	=> $this->input->post('cbill'),
			'bill_meterUsed' 	=> $this->input->post('meterUsed'),
			'bill_currUsage' 	=> $this->input->post('cusage'),
			'bill_meterReader'	=> $this->input->post('read'),
			'bill_numOfRead'	=> $this->input->post('numofread'),
			'Meter_Mtr_no'		=> $this->input->post('no'),
			'Cubic_Cubic_no'	=> $this->input->post('cubic'),
			'reading_read_no'	=> $read
		);
		
		$res = $this->staff_model->add_bill($bill_arr);
		$data['reading'] = $this->staff_model->get_bill();
		
		redirect('staff/dashboard');
	}

	public function getMonth($month_num)
	{
		switch ($month_num) {
			case 1: return "Jan"; break;
			case 2: return "Feb"; break;
			case 3: return "Mar"; break;
			case 4: return "Apr"; break;
			case 5: return "May"; break;
			case 6: return "Jun"; break;
			case 7: return "Jul"; break;
			case 8: return "Aug"; break;
			case 9: return "Sep"; break;
			case 10: return "Oct"; break;
			case 11: return "Nov"; break;
			case 12: return "Dec"; break;
		}

		return $temp;
	}

	public function convertMonth($Read_date)
	{
		$temp = substr($Read_date, 4, -8);

		switch ($temp) {
			case 'Jan': return 1; break;
			case 'Feb': return 2; break;
			case 'Mar': return 3; break;
			case 'Apr': return 4; break;
			case 'May': return 5; break;
			case 'Jun': return 6; break;
			case 'Jul': return 7; break;
			case 'Aug': return 8; break;
			case 'Sep': return 9; break;
			case 'Oct': return 10; break;
			case 'Nov': return 11; break;
			case 'Dec': return 12; break;
		}

		return $temp;
	}
}
