<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('consumer_model');
        $this->load->model('cashier_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
    }
    
	public function index()
	{
		$this->load->view('cashier/paid', $data);
	}

	public function getConsumerRecord()
	{
		$Cons_name = $this->input->post('Search');
		$data['record'] = $this->cashier_model->get_Paids($Cons_name);
		$data['name'] = $this->cashier_model->get_consumerNameR($Cons_name);

		$this->load->view('cashier/paid', $data);
	}
}
