<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paid extends CI_Controller {

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
		$this->load->view('admin/paid', $data);
	}

	public function getConsumerRecord()
	{
		$Cons_name = $this->input->post('Search');
		$data['record'] = $this->admin_model->get_Paids($Cons_name);
		$data['name'] = $this->admin_model->get_consumerName($Cons_name);

		$this->load->view('admin/paid', $data);
	}
}
