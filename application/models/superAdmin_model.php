<?php

    class superAdmin_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function add_employee($data)
        {
            $this->db->insert('employee', $data);
            return $this->db->insert_id();
        }

        function get_employee()
        {
            $this->db->select('*');
            $this->db->from('employee');

            $query = $this->db->get();
            return $query->result();
        }

        public function add_cubic($data)
        {
            $this->db->insert('cubic', $data);
            return $this->db->insert_id();
        }

        function get_cubic()
        {
            $this->db->select('*');
            $this->db->from('cubic');

            $query = $this->db->get();
            return $query->result();
        }

        public function add_fee($data)
        {
            $this->db->insert('fee', $data);
            return $this->db->insert_id();
        }

        function get_fee()
        {
            $this->db->select('*');
            $this->db->from('fee');

            $query = $this->db->get();
            return $query->result();
        }

        function admin()
        {
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('Acc_type = "Admin"');
            $this->db->where('Emp_status = "Active"');

            $query = $this->db->get();
            return $query->result();
        }

        function count_admin()
        {
            $query = $this->db->query("SELECT COUNT(Acc_type) as type FROM `employee`
                WHERE Acc_type = 'Admin'
                AND Emp_status = 'Active'");

            return $query->row_array();
        }

        function cashier()
        {
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('Acc_type = "Cashier"');
            $this->db->where('Emp_status = "Active"');

            $query = $this->db->get();
            return $query->result();
        }

        function count_cashier()
        {
            $query = $this->db->query("SELECT COUNT(Acc_type) as type FROM `employee`
                WHERE Acc_type = 'Cashier'
                AND Emp_status = 'Active'");

            return $query->row_array();
        }

        function staff()
        {
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('Acc_type = "Staff"');
            $this->db->where('Emp_status = "Active"');

            $query = $this->db->get();
            return $query->result();
        }

        function count_staff()
        {
            $query = $this->db->query("SELECT COUNT(Acc_type) as type FROM `employee`
                WHERE Acc_type = 'Staff'
                AND Emp_status = 'Active'");

            return $query->row_array();
        }

        function inactive()
        {
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('Emp_status = "Inactive"');

            $query = $this->db->get();
            return $query->result();
        }

        function count_inactive()
        {
            $query = $this->db->query("SELECT COUNT(Emp_status) as type FROM `employee`
                WHERE Emp_status = 'Inactive'");

            return $query->row_array();
        }

        function cubic()
        {
            $query = $this->db->query("SELECT * FROM cubic
                ORDER BY Cubic_no DESC LIMIT 1");
            return $query->result();
        }

        function fee()
        {
            $query = $this->db->query("SELECT * FROM fee
                ORDER BY fee_no DESC LIMIT 1");
            return $query->result();
        }

        public function get_max()
        {
            $this->db->select("max(Emp_id) as Emp_id");
            $this->db->from('employee');

            $query = $this->db->get();
            return $query->row()->Emp_id;
        }

        public function get_maxNo()
        {
            $this->db->select("max(Emp_no) as Emp_no");
            $this->db->from('employee');

            $query = $this->db->get();
            return $query->row()->Emp_no;
        }

        public function inactiveStatus($id)
        {
            $data = array (
                'Emp_status' => "Inactive"
            );
            $this->db->where('Emp_no', $id);
            return $this->db->update('employee',$data);
        }

        public function activeStatus($id)
        {
            $data = array (
                'Emp_status' => "Active"
            );
            $this->db->where('Emp_no', $id);
            return $this->db->update('employee',$data);
        }

        public function update_employee($no, $data)
        {
            $this->db->where('Emp_no', $no);
            $this->db->update('employee',$data);

            return $this->db->affected_rows() > 0;
        }
    }
?>