<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this->load->helper('url');
		$this->load->model('staff_model');
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
		// not read
		$month = $this->getMonth(date('m'));
		$Read_nos=""; $Meter_nos="";
		$data['toCheck'] = $this->staff_model->get_latest_read();
		foreach ($data['toCheck'] as $check) {
			$Read_nos = $Read_nos.$check['Read_no'].',';
			$Meter_nos = $Meter_nos.$check['Mtr_no'].',';
		}
		$Read_no = substr_replace($Read_nos ,"", -1);
		$Meter_no = substr_replace($Meter_nos ,"", -1);
		$data['consumer'] = $this->staff_model->get_consumer($month, $Read_no);
		$data['noRead_consumer'] = $this->staff_model->get_consumer_noRead($Meter_no);
		// not read

		// notice of disconnection
		$data['noticeOfDisconnection'] = $this->admin_model->noticeOfDisconnection();					
		// notice of disconnection

		//chart
		$data['year'] = $this->admin_model->getYear();
		//chart

		$this->load_admin_view('dashboard' , $data);
		
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

}
