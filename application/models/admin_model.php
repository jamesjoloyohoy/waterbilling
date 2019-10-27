<?php

    class admin_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function add_consumer($data)
        {
            $this->db->insert('consumer', $data);
            return $this->db->insert_id();
        }

        public function update_consumerInfo($no, $data)
        {
            $this->db->where('Cons_no', $no);
            $this->db->update('consumer',$data);

            return $this->db->affected_rows() > 0;
        }

        public function add_meter($data)
        {
            $this->db->insert('meter', $data);
            return $this->db->insert_id();
        }

        function get_meter()
        {
            $this->db->select('*');
            $this->db->from('meter');

            $query = $this->db->get();
            return $query->result();
        }

        public function get_zone()
        {
            $this->db->select('distinct(Cons_zone) as Cons_zone');
            $this->db->from('consumer,meter');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where("Mtr_status = 'Connect'");

            $query = $this->db->get();
            return $query->result();
        }

        public function get_barangay()
        {
            $this->db->select('distinct(Cons_barangay) as Cons_barangay');
            $this->db->from('consumer,meter');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where("Mtr_status = 'Connect'");

            $query = $this->db->get();
            return $query->result();
        }

        public function get_consumer()
        {
            $this->db->select('*');
            $this->db->from('consumer,meter,fee');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where('consumer.fee_Fee_no = fee.Fee_no');
            $this->db->where("Mtr_status = 'Connect'");

            $query = $this->db->get();
            return $query->result();
        }

        function count_connected()
        {
            $query = $this->db->query("SELECT COUNT(Cons_no) as Cons_no 
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND Mtr_status = 'Connect'");

            return $query->row_array();
        }

        public function get_consumerDis()
        {
            $this->db->select('*');
            $this->db->from('consumer,meter');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where("Mtr_status = 'Disconnect'");

            $query = $this->db->get();
            return $query->result();
        }

        function count_disconnected()
        {
            $query = $this->db->query("SELECT COUNT(Cons_no) as Cons_no 
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND Mtr_status = 'Disconnect'");

            return $query->row_array();
        }

        public function noticeOfDisconnection()
        {
            $this->db->select('*, SUM(Read_currBill) as Read_currBill, SUM(Rate_totalUsage)');
            $this->db->from('consumer,meter,reading,rate');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where('reading.Meter_Mtr_no = meter.Mtr_no');
            $this->db->where('reading.rate_Rate_no = rate.Rate_no');
            $this->db->where("Read_numOfRead = '3'");
            $this->db->group_by('Mtr_id');

            $query = $this->db->get();
            return $query->result_array(); 
        }

        public function disconnect($id)
        {
            $data = array (
                'Mtr_status' => "Disconnect"
            );
            $this->db->where('Mtr_no', $id);
            return $this->db->update('meter',$data);
        }

        public function connect($id)
        {
            $data = array (
                'Mtr_status' => "Connect"
            );
            $this->db->where('Mtr_no', $id);
            return $this->db->update('meter',$data);
        }

        public function get_byZone($zone)
        {
            return $this->db->query("SELECT * FROM consumer, meter
            where concat(Cons_zone, ' ', Cons_barangay) like '{$zone}'
            AND meter.consumer_Cons_no = consumer.Cons_no
            AND Mtr_status != 'Disconnect'")->result();
        }

        public function getYear()
        {
            $query = $this->db->query("SELECT month(Trans_date) as month,year(Trans_date) AS year, SUM(Trans_amount) as amt
            FROM transaction
            GROUP BY concat(month(Trans_date),'-',year(Trans_date))  
            ORDER BY year(Trans_date),month(Trans_date)");
            return $query->result_array();
        }

        public function get_ConsumerInfo($id)
        {
            $this->db->select('*, (Connection_fee + Membership_fee + consumer.Cons_serviceFee + consumer.Cons_otherFee) AS fee');
            $this->db->from('fee,consumer,meter');
            $this->db->where('consumer.fee_Fee_no = fee.Fee_no');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where("meter.Mtr_no = $id");

            $query = $this->db->get();
            return $query->row_array();
        }

        public function getMet()
        {
            $this->db->select('*');
            $this->db->from('meter');

            $query = $this->db->get();
            return $query->result_array();
        }

        public function getName()
        {
            $this->db->select("concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name");
            $this->db->from('consumer,meter,transaction');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where('transaction.meter_Mtr_no = meter.Mtr_no');
            $this->db->where("Mtr_status != 'Disconnect'");
            $this->db->group_by('Cons_no');

            $query = $this->db->get();
            return $query->result();
        }

        public function getPaid($Cons_name)
        {
            $this->db->select("trans_date, concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, concat(Emp_fName,' ',Emp_mName,' ',Emp_faName) as Emp_name, Trans_amount,Cubic_meter");
            $this->db->from('transaction, consumer, meter, employee, reading, transaction_details,cubic');
            $this->db->where('transaction.meter_Mtr_no = meter.Mtr_no');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where('transaction.Employee_Emp_no = employee.Emp_no');
            $this->db->where('transaction_details.transaction_Trans_no = transaction.Trans_no');
            $this->db->where('transaction_details.reading_Read_no = reading.Read_no');
            $this->db->where('cubic.Cubic_no=reading.Cubic_Cubic_no');
            $this->db->group_by('transaction.trans_no');
            $this->db->where("concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'");
         
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getPaidByDate($from, $to)
        {
            $this->db->select("trans_date, concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Address, Trans_amount, Mtr_id,Cubic_meter");
            $this->db->from('transaction, consumer, meter, employee, reading, transaction_details,cubic');
            $this->db->where('transaction.meter_Mtr_no = meter.Mtr_no');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where('transaction.Employee_Emp_no = employee.Emp_no');
            $this->db->where('transaction_details.transaction_Trans_no = transaction.Trans_no');
            $this->db->where('transaction_details.reading_Read_no = reading.Read_no');
            $this->db->where('cubic.Cubic_no=reading.Cubic_Cubic_no');
            $this->db->group_by('transaction.trans_no');
            $this->db->where("date(trans_date) >= '{$from}'");
            $this->db->where("date(trans_date) <= '{$to}'");

            $query = $this->db->get();
            return $query->result_array();
        }
    }
?>