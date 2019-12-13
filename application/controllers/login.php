<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Login_model');
	}
	
	public function index()
	{
		$this->load->view('Login');
	}
	public function check_login()
	{
		$data = array('Emp_username' => $this->input->post('Emp_username') , 
					  			'Emp_password' => $this->input->post('Emp_password')
					  		);
		$hasil = $this->Login_model->check_user($data);
		
		if ($hasil->num_rows() == 1){
			foreach($hasil->result() as $sess)
            {
              $sess_data['logged_in'] = 'Login';
							$sess_data['Emp_username'] = $this->input->post('Emp_username');
							$sess_data['Emp_password'] = $this->input->post('Emp_password');

							$sess_data['Emp_no'] = $sess->Emp_no;
							$sess_data['Emp_id'] = $sess->Emp_id;
							
							$sess_data['Emp_fName'] = $sess->Emp_fName;
							$sess_data['Emp_faName'] = $sess->Emp_faName;
							$sess_data['Emp_mName'] = $sess->Emp_mName;
							$sess_data['Emp_contact'] = $sess->Emp_contact;
							
							$sess_data['Emp_status'] = $sess->Emp_status;
							$sess_data['Emp_address'] = $sess->Emp_address;
			  
			  
              $sess_data['Acc_type'] = $sess->Acc_type;
              $this->session->set_userdata($sess_data);
			}
			
			if($this->session->userdata('Emp_status')=='Active')
			{
				if ($this->session->userdata('Acc_type')=='SAdmin')
				{
					redirect('superAdmin/dashboard');
				}
				elseif ($this->session->userdata('Acc_type')=='Admin')
				{
					redirect('admin/dashboard');
				}
				elseif ($this->session->userdata('Acc_type')=='Staff')
				{
					redirect('staff/dashboard');
					
				}
				elseif ($this->session->userdata('Acc_type')=='Cashier')
				{
					redirect('cashier/dashboard');
				}
			}


			else
			{
				echo " <script>alert('Sorry your account is INACTIVE!');history.go(-1);</script>";
			}
			
		}
		else
		{
			echo " <script>alert('Check your USERNAME and PASSWORD!');history.go(-1);</script>";
		}
		
	}
	public function logout() {
		$_SESSION = array();  
		session_destroy($data);
		redirect('login');
	} 
}