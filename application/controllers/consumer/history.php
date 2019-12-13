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
	
		if($this->consumer_model->readConsumer($Cons_name) == null)
		{
			$this->session->set_flashdata('error', 'No consumer name found!');
			redirect('consumer/dashboard');
		}
			$data['name'] = $this->consumer_model->readConsumer($Cons_name);
			$data['balance'] = $this->consumer_model->readBalance($Cons_name);
			$data['Paid'] = $this->consumer_model->get_Paid($Cons_name);
			$this->load_consumer_view('history', $data);
	
	}
}
