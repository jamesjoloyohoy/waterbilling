<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notice extends CI_Controller {

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
    
	public function index()
	{
		$this->load->view('admin/notice');
	}
}
