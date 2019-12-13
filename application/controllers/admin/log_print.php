<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class log_print extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('admin_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
    }
    
	public function index()
	{
		// LOG BY METER READER
		if ($_GET['from_date'] == null && $_GET['Search'] != null) {
			$data['log_print'] = $this->admin_model->get_logName($_GET['Search']);
			$data['log'] = $this->admin_model->get_record($_GET['Search']);
		} elseif ($_GET['from_date'] == null && $_GET['Search'] == null) {
			$this->session->userdata('', 'Way sulod bes');
			redirect('admin/log');
		} else {
			$date = explode(' ', $_GET['from_date']);
			$data['month'] = substr($date[0], 0, 3);
			$data['year'] = $date[1];
			
			// LOG BY MONTH
			if ($_GET['from_date'] != null && $_GET['Search'] == null) {
				$data['log'] = $this->admin_model->get_recordByDate($data['month'], $data['year']);
			} else {
				// LOG BY METER READER AND MONTH
				$data['log'] = $this->admin_model->get_record_all($data['month'], $data['year'], $_GET['Search']);
			}
		}
		
		$this->load->view('admin/log_print', $data);
	}

	public function getRecord()
	{
		$meterReader = $this->input->post('Search');
		$data['log_print'] = $this->admin_model->get_logName($meterReader);
		$data['log'] = $this->admin_model->get_record($meterReader);

		$this->load->view('admin/log_print', $data);
	}
}
