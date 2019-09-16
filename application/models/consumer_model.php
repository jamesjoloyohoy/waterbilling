<?php

    class consumer_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_record($Cons_name)
        {
            $this->db->select("*");
            $this->db->from('meter,consumer,reading,cubic,transaction,employee');
            $this->db->where('transaction.Employee_Emp_no = employee.Emp_no');
            $this->db->where('meter.Consumer_Cons_no = consumer.Cons_no');
            $this->db->where('reading.Meter_Mtr_no = meter.Mtr_no');
            $this->db->where('transaction.meter_Mtr_no = meter.Mtr_no');
            $this->db->where('cubic.Cubic_no=reading.Cubic_Cubic_no');
            $this->db->group_by('transaction.Trans_no');
            $this->db->where("concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'");

            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_consumerName($Cons_name)
        {

            return $this->db->query("SELECT *
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'")->row_array();
        }

    }
?>