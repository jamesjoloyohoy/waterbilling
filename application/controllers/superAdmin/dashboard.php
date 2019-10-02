<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

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

	function load_sAdmin_view($content, $data)
	{
		$data['content'] = $content;
		$this->load->view('superAdmin/template/layout', $data);
	}

	public function index()
	{

		$data['Emp_id'] = $this->superAdmin_model->get_max();
		if ($data['Emp_id'] == null) {
			$data['Emp_id'] = 101;
		} else {
			$data['Emp_id'] += 1;
		}

		$data['Emp_no'] = $this->superAdmin_model->get_maxNo();
		if ($data['Emp_no'] == null) {
			$data['Emp_no'] = 1;
		} else {
			$data['Emp_no'] += 1;
		}

		$data['admin'] = $this->superAdmin_model->admin();
		$data['cadmin'] = $this->superAdmin_model->count_admin();
		$data['cashier'] = $this->superAdmin_model->cashier();
		$data['ccashier'] = $this->superAdmin_model->count_cashier();
		$data['staff'] = $this->superAdmin_model->staff();
		$data['cstaff'] = $this->superAdmin_model->count_staff();
		$data['inactive'] = $this->superAdmin_model->inactive();
		$data['cinactive'] = $this->superAdmin_model->count_inactive();
		$data['cubic'] = $this->superAdmin_model->cubic();
		$data['fee'] = $this->superAdmin_model->fee();

		$this->load_sAdmin_view('dashboard', $data);
	}


	public function add_new_employee()
	{
		$udata = array
		(
			'Emp_id'			=> $this->input->post('id'),
			'Emp_fName'			=> $this->input->post('fName'),
			'Emp_mName'			=> $this->input->post('mName'),
			'Emp_faName'		=> $this->input->post('faName'),
			'Emp_username'		=> $this->input->post('username'),
			'Emp_address'		=> $this->input->post('address'),
			'Emp_contact'		=> $this->input->post('contact'),
			'Acc_type'			=> $this->input->post('type'),
			'Emp_status'		=> $this->input->post('status'),
			'Emp_password'		=> $this->input->post('password')
		);

		$res = $this->superAdmin_model->add_employee($udata);
		$data['employee'] = $this->superAdmin_model->get_employee();
		
		echo json_encode($data);
	}

	
	public function add_cubic()
	{
		$cdata = array
		(
			'Cubic_meter'		=>	$this->input->post('cubic'),
			'Date_updated'		=>	$this->input->post('date')
		);

		$res = $this->superAdmin_model->add_cubic($cdata);
		$data['cubic'] = $this->superAdmin_model->get_cubic();

		echo json_encode($data);
	}

	public function add_fee()
	{
		$fdata = array
		(
			'Connection_fee'		=>	$this->input->post('connection'),
			'Reconnection_fee'		=>	$this->input->post('reconnection'),
			'Membership_fee'		=>	$this->input->post('membership'),
			'Date_updated'			=>	$this->input->post('date')
		);

		$res = $this->superAdmin_model->add_fee($fdata);
		$data['fee'] = $this->superAdmin_model->get_fee();

		echo json_encode($data);
	}

	public function active($id)
	{
		$this->superAdmin_model->activeStatus($id);
		redirect('superAdmin/dashboard');
	}

	public function inactive($id)
	{
		$this->superAdmin_model->inactiveStatus($id);
		redirect('superAdmin/dashboard');
	}

	public function update_employee()
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
