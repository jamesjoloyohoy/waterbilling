<?php

    class cashier_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function add_transaction($data)
        {
            $this->db->insert('transaction', $data);
            return $this->db->insert_id();
        }

        public function add_trans_det($data)
        {
            return $this->db->insert_batch('transaction_details', $data);
        }

        public function get_trans_det()
        {
            $this->db->select('*');
            $this->db->from('transaction,transaction_details,reading');
            $this->db->where('transaction.Trans_no = Transaction_details.transaction_Trans_no');
            $this->db->where('reading.Read_no = Transaction_details.reading_Read_no');

            $query = $this->db->get();
            return $query->row();
        }


        public function get_meter($Mtr_id, $Read_no)
        {
            $query = $this->db->query("SELECT * FROM meter,consumer,reading,bill,rate 
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_no = reading.Meter_Mtr_no
                AND bill.Bill_no = reading.bill_Bill_no
                AND rate.Rate_no = reading.rate_Rate_no
                AND meter.Mtr_id = $Mtr_id
                AND reading.Read_no > $Read_no
            ");

            return $query->result_array();
        }

        public function get_meters($Mtr_id)
        {
            $query = $this->db->query("SELECT * FROM meter,consumer,reading,bill,rate 
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_no = reading.Meter_Mtr_no
                AND bill.Bill_no = reading.bill_Bill_no
                AND rate.Rate_no = reading.rate_Rate_no
                AND meter.Mtr_id = $Mtr_id
           ");

            return $query->row_array();
        }

        public function get_max($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(reading.Read_no) AS max_read, reading.Read_meterUsed*reading.Cubic_Cubic_no AS total FROM meter,consumer,reading,bill,rate 
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_no = reading.Meter_Mtr_no
                AND bill.Bill_no = reading.bill_Bill_no
                AND rate.Rate_no = reading.rate_Rate_no
                AND meter.Mtr_id = $Mtr_id
           ");

            return $query->row_array();
        }

        public function get_latest_trans($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(transaction_details.reading_Read_no) as Read_no FROM meter, reading, transaction_details
                WHERE meter.Mtr_no=reading.Meter_Mtr_no
                AND reading.Read_no=transaction_details.reading_Read_no
                AND meter.Mtr_id = $Mtr_id");
            return $query->row()->Read_no ?? 0;
        }

        public function get_latest_transactions()
        {
            $query = $this->db->query("SELECT meter.Mtr_id, MAX(transaction_details.reading_Read_no) as Read_no FROM meter, reading, transaction_details
                WHERE meter.Mtr_no=reading.Meter_Mtr_no
                AND reading.Read_no=transaction_details.reading_Read_no
                GROUP BY meter.Mtr_id");
            return $query->result_array();
        }

        public function get_notPaid()
        {
            return $this->db->query("SELECT r2.max_Read_no, r1.Meter_Mtr_no, r1.Read_numOfRead, Mtr_id, Cons_no, Cons_faName, Cons_fName, Cons_mName, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Cons_address, (r1.Read_currBill + r1.Read_prevBill) AS Read_currBill, (rate.Rate_prevUsage+rate.Rate_totalUsage) as Rate_totalUsage, Read_date
            
            FROM reading r1
            LEFT JOIN meter ON r1.Meter_Mtr_no=meter.Mtr_no
			LEFT JOIN consumer ON meter.consumer_Cons_no=consumer.Cons_no
            LEFT JOIN rate ON r1.rate_Rate_no=rate.Rate_no
            INNER JOIN(
                SELECT MAX(Read_no) AS max_Read_no, Meter_Mtr_no
                FROM reading
                LEFT JOIN rate ON rate.Rate_no=reading.rate_Rate_no
                GROUP by Meter_Mtr_no ) r2 ON r2.Meter_Mtr_no = r1.Meter_Mtr_no AND r2.max_Read_no = r1.Read_no
            GROUP BY consumer.Cons_no")->result_array(); 
        }

        public function consumer()
        {
            $this->db->select("*, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Cons_address, MAX(reading.Read_no) as Read_no,MAX(Read_numOfRead) as Read_numOfRead, SUM(Read_currBill) as Read_prevBill");
            $this->db->from('meter');
            $this->db->join('consumer','meter.consumer_Cons_no=consumer.Cons_no','left');
            $this->db->join('reading','reading.Meter_Mtr_no=meter.Mtr_no','left');
            $this->db->join('rate','reading.rate_Rate_no=rate.Rate_no', 'left');
            $this->db->join('transaction','transaction.meter_Mtr_no=meter.Mtr_no', 'left');
            $this->db->group_by('consumer.Cons_no');
            
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_Paid()
        {
            $this->db->select("*");
            $this->db->from('meter,consumer,reading,cubic,transaction,employee');
            $this->db->where('transaction.Employee_Emp_no = employee.Emp_no');
            $this->db->where('meter.Consumer_Cons_no = consumer.Cons_no');
            $this->db->where('reading.Meter_Mtr_no = meter.Mtr_no');
            $this->db->where('transaction.meter_Mtr_no = meter.Mtr_no');
            $this->db->where('cubic.Cubic_no=reading.Cubic_Cubic_no');
            $this->db->group_by('transaction.Trans_no');

            $query = $this->db->get();
            return $query->result_array();
        }
    }
?>