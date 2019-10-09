<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
	}

	function load_cashier_view($content)
	{
		$data['content'] = $content;
		$this->load->view('cashier/template/layout', $data);
	}

	public function index()
	{
		$this->load_cashier_view('profile');
	}
}
