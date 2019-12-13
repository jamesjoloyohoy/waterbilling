<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class log extends CI_Controller {

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

	function load_admin_view($content, $data)
	{
		$data['content'] = $content;
		$this->load->view('admin/template/layout', $data);
	}

	public function index()
	{
		$data['log'] = $this->admin_model->get_log();
		$data['name'] = $this->admin_model->get_meterReader();
		$this->load_admin_view('log', $data);
	}
}
