<?php

    class staff_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function add_reading($data)
        {
            $this->db->insert('reading', $data);
            return $this->db->insert_id();
        }

        public function add_bill($data)
        {
            $this->db->insert('bill', $data);
            return $this->db->insert_id();
        }

        public function add_rate($data)
        {
            $this->db->insert('rate', $data);
            return $this->db->insert_id();
        }

        public function get_reading()
        {
            $this->db->select('*');
            $this->db->from('reading,bill,rate,meter');
            $this->db->where('reading.bill_Bill_no = bill.Bill_no');
            $this->db->where('reading.rate_Rate_no = rate.Rate_no');
            $this->db->where('meter.Mtr_no = reading.meter_Mtr_no');

            return $this->db->get()->result();    
        }

        public function get_consumer($month, $Read_no)
        {
            $query = $this->db->query("SELECT *, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Cons_address
                FROM consumer, meter, reading
                WHERE meter.consumer_Cons_no=consumer.Cons_no
                AND reading.Meter_Mtr_no=meter.Mtr_no
                AND reading.Read_date not LIKE '%$month%'
                AND reading.Read_no IN ($Read_no)
                GROUP BY meter.Mtr_no  
                ORDER BY Cons_address");
            return $query->result();
        }

        public function get_meter($Mtr_id, $Read_no)
        {
            $query = $this->db->query("SELECT r2.Read_no, r1.Meter_Mtr_no, r1.Read_numOfRead, (r1.Read_currBill + r1.Read_prevBill) AS Read_currBill, Mtr_id
            FROM reading r1
            LEFT JOIN meter ON r1.Meter_Mtr_no=meter.Mtr_no
            LEFT JOIN consumer ON consumer.Cons_no=meter.consumer_Cons_no
            INNER JOIN(
                SELECT MAX(Read_no) AS Read_no, Meter_Mtr_no 
                FROM reading
                GROUP by Meter_Mtr_no ) r2 ON r2.Meter_Mtr_no = r1.Meter_Mtr_no
                
                AND r2.Read_no = r1.Read_no
            WHERE meter.Mtr_id = $Mtr_id
            AND r2.Read_no > $Read_no
            GROUP BY consumer.Cons_no");
            return $query->row_array();

            // $this->db->select('*');
            // $this->db->from('meter,consumer');
            // $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            // $this->db->where('meter.Mtr_id', $Mtr_id);

            // $query = $this->db->get();
            // return $query->row_array();
        }

        public function get_meters($Mtr_id)
        {
            $query = $this->db->query("SELECT * FROM meter,consumer 
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                -- AND meter.Mtr_no = reading.Meter_Mtr_no
                -- AND bill.Bill_no = reading.bill_Bill_no
                -- AND rate.Rate_no = reading.rate_Rate_no
                AND meter.Mtr_id = $Mtr_id
            ");

            return $query->row_array();
        }

        public function get_meterss($Mtr_id)
        {
            $query = $this->db->query("SELECT * FROM meter,consumer 
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_no = $Mtr_id
            ");

            return $query->row_array();
        }


        function get_maxCubic()
        {
            $query = $this->db->query("SELECT * FROM cubic
                ORDER BY Cubic_no DESC LIMIT 1");
            return $query->row_array();
        }

        public function get_latest_read()
        {
            $query = $this->db->query("SELECT meter.Mtr_no, meter.Mtr_id, MAX(reading.Read_no) as Read_no FROM consumer,meter,reading
                WHERE consumer.Cons_no = meter.consumer_Cons_no
                AND reading.Meter_Mtr_no = meter.Mtr_no
                GROUP BY meter.Mtr_id");
            return $query->result_array();
        }

        public function get_consumer_noRead($Mtr_no)
        {   
            $query = $this->db->query("SELECT *, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Cons_address
                FROM consumer, meter
                WHERE meter.consumer_Cons_no=consumer.Cons_no
                AND Mtr_status = 'Connect'
                AND meter.Mtr_no NOT IN ($Mtr_no)
                ORDER BY Cons_address");
            return $query->result();
        }
    }
?>