<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login_model extends CI_Model 
	{

		public function check_user($data) 
		{
			$query = $this->db->get_where('employee', $data);
			return $query;
		}

	}

?>