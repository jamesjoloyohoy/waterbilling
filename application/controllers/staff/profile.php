<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('superAdmin_model');
		if($this->session->userdata('Emp_username')=="")
		{
			redirect('login');
		}
	}

	function load_staff_view($content)
	{
		$data['content'] = $content;
		$this->load->view('staff/template/layout', $data);
	}

	public function index()
	{
		$this->load_staff_view('profile');
	}

	public function update()
	{
		$data = array
		(
			'Emp_id'			=> $this->input->post('uid'),
			'Emp_fName'			=> $this->input->post('ufName'),
			'Emp_mName'			=> $this->input->post('umName'),
			'Emp_faName'		=> $this->input->post('ufaName'),
			'Emp_username'		=> $this->input->post('uusername'),
			'Emp_address'		=> $this->input->post('uaddress'),
			'Emp_contact'		=> $this->input->post('ucontact'),
			'Acc_type'			=> $this->input->post('uacc_type'),
			'Emp_status'		=> $this->input->post('ustatus'),
			'Emp_password'		=> $this->input->post('upassword')
		);

		$this->superAdmin_model->update_employee($this->input->post('no'), $data) == true;
		
		echo json_encode($data);
	}
}
