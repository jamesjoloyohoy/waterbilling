<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paidByDate extends CI_Controller {

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
        $data;
		$data['reading_paid'] = $this->admin_model->getPaidByDate($_GET['from_date'], $_GET['to_date']);
		$data['from_date'] = $_GET['from_date'];
		$data['to_date'] = $_GET['to_date'];

		$this->load->view('admin/paidByDate', $data);
	}
}
