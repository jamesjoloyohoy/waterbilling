<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('consumer_model');
	}

	function load_consumer_view($content, $data)
	{
		$data['content'] = $content;
		$this->load->view('consumer/template/layout', $data);
	}

	public function index()
	{	
		$this->load_consumer_view('history');
	}

	public function searchConsumer()
	{
		$Cons_name = $this->input->post('search_fullname');
		$data['history'] = $this->consumer_model->get_record($Cons_name);
		$data['name'] = $this->consumer_model->get_consumerName($Cons_name);
	
		$this->load_consumer_view('history', $data);
	}
}
