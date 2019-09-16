<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class zone extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('admin_model');
	}

	public function index()
	{
        $zone = $this->input->post('searchZone').' '.$this->input->post('searchBrgy');
		$data['zone'] = $this->admin_model->get_byZone($zone);
		$this->load->view('admin/zone' , $data);
	}
}
