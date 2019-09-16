<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class view_consumer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('admin_model');
	}

	public function index()
	{
		$this->load->view('admin/view_consumer');
	}
}
