<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
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
		// not read
		// $month = $this->getMonth(date('m'));
		// $Read_nos=""; $Meter_nos="";

		// $data['toCheck'] = $this->staff_model->get_latest_read();
		// $data['readingCount'] = count($data['toCheck']);
		// $Meter_no = 0;

		// if (count($data['toCheck']) > 0) {
		// 	foreach ($data['toCheck'] as $check) {
		// 		$Read_nos = $Read_nos.$check['Read_no'].',';
		// 		$Meter_nos = $Meter_nos.$check['Mtr_no'].',';
		// 	}
		// 	$Read_no = substr_replace($Read_nos ,"", -1);
		// 	$Meter_no = substr_replace($Meter_nos ,"", -1);
		// 	$data['consumer'] = $this->staff_model->get_consumer($month, $Read_no);
		// }

		// $data['noRead_consumer'] = $this->staff_model->get_consumer_noRead($Meter_no);
		// not read
		
		// notice of disconnection
		// $data['latestTrans'] = $this->admin_model->readLatestTransactions(); 
		// $data['noticeOfDisconnection'] = $this->admin_model->noticeOfDisconnection(); 
		// $data['nodNewMeters'] = $this->admin_model->nodForNoTrans();
		
		// notice of disconnection


		// notice of disconnection
		$data['noticeOfDisconnection'] = $this->admin_model->get_noticeOfDisconnection();
		// notice of disconnection

		// disconnect
		$data['consumerdis'] = $this->admin_model->get_consumerDis();

		// disconnect
		
		// no read
		$month = $this->getMonth(date('m'));
		$year = date('y');
		$data['noRead'] = $this->admin_model->get_noRead($month,$year);
		// no read

		//chart
		$data['year'] = $this->admin_model->getYear();
		//chart
		$this->load_admin_view('dashboard', $data);
		
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

	public function disconnect($Mtr_no)
	{
		$bill_date = $this->convertMonth($this->admin_model->dcDate($Mtr_no));
		if (date('m') == ($bill_date+1)) {
			if (date('d') >= 10) {
				$this->admin_model->disconnect($Mtr_no);
				$this->session->set_flashdata('error', 'na DC na sya BRO!');
				redirect('admin/dashboard');
			}
			else {
				$this->session->set_flashdata('error', 'wala pay 10 BRO!');
				redirect('admin/dashboard');
			}
		} else {
			$this->session->set_flashdata('error', 'next month pa ang disconnection BRO!');
			redirect('admin/dashboard');
		}
	}

	public function connect($id)
	{
		if ($this->admin_model->reconnect($id) != null) {
			$this->session->set_flashdata('error', 'Meter have remaining balance');
			redirect('admin/dashboard');
		} else {
			$this->admin_model->connect($id);
			$this->session->set_flashdata('error', 'Meter was reconnected');
			redirect('admin/dashboard');
		}
	}

}
