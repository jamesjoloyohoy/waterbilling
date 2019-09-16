<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

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

	function load_staff_view($content)
	{
		$data['content'] = $content;
		$this->load->view('staff/template/layout', $data);
	}

	public function index()
	{
		$this->load_staff_view('dashboard');
	}
}
