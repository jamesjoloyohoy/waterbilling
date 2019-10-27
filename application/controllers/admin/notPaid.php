<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notPaid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('cashier_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
    }
    
	public function index()
	{
        $data['noTrans'] = $this->cashier_model->consumer();
        $data['toCompare'] = $this->cashier_model->get_latest_transactions();
        $data['notPaid'] = $this->cashier_model->get_notPaid();

		$this->load->view('admin/notPaid' , $data);
	}
}
