<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('consumer_model');
	}

	function load_consumer_view($content)
	{
		$data['content'] = $content;
		$this->load->view('consumer/template/layout', $data);
	}

	public function index()
	{
		$this->load_consumer_view('dashboard');
	}
}
