<?php

    class staff_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function add_bill($data)
        {
            $this->db->insert('bill', $data);
            return $this->db->insert_id();
        }

        public function add_read($data)
        {
            $this->db->insert('reading', $data);
            return $this->db->insert_id();
        }

        public function get_bill()
        {
            $this->db->select('*');
            $this->db->from('reading,bill,meter');
            $this->db->where('bill.reading_read_no = reading.read_no');
            $this->db->where('meter.Mtr_no = bill.meter_Mtr_no');

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

        public function readConsumer($meterID)
        {
            $query = $this->db->query("SELECT * FROM consumer 
                                    LEFT JOIN meter ON meter.consumer_Cons_no=consumer.Cons_no
                                    WHERE Mtr_id = $meterID
                                    AND Mtr_status = 0");
            return $query->row_array();
        }

        public function readConsumers($meterID)
        {
            $query = $this->db->query("SELECT * FROM consumer 
                                    LEFT JOIN meter ON meter.consumer_Cons_no=consumer.Cons_no
                                    WHERE Mtr_no = $meterID");
            return $query->row_array();
        }

        public function get_currBill($Mtr_id)
        {
            $query = $this->db->query("SELECT SUM(bill_meterUsed) as currBill FROM bill,meter
                                    WHERE bill.Meter_Mtr_no = meter.Mtr_no
                                    AND meter.Mtr_id = $Mtr_id
                                    GROUP BY meter.Mtr_no");
            return $query->row_array();
        }

        // public function get_currBills($Mtr_id)
        // {
        //     $query = $this->db->query("SELECT SUM(bill_meterUsed) as currBill FROM bill,meter
        //                             WHERE bill.Meter_Mtr_no = meter.Mtr_no
        //                             AND meter.Mtr_no = $Mtr_id
        //                             GROUP BY meter.Mtr_no");
        //     return $query->row_array();
        // }

        public function readBill($Mtr_id, $Bill_no)
        {
            $query = $this->db->query("SELECT *,SUM(bill_meterUsed) as currBill ,SUM(bill_currBill) AS totalBill, SUM(bill_currUsage) as totalUsage, MAX(bill_numOfRead) as bill_numOfRead FROM bill
                    LEFT JOIN meter ON meter.mtr_no=bill.Meter_mtr_no
                    LEFT JOIN reading ON reading.Read_no=bill.reading_read_no
                    WHERE Mtr_id = $Mtr_id
                    AND bill_no > $Bill_no");
            return $query->row_array();
        }

        // public function readBills($Mtr_id, $Bill_no)
        // {
        //     $query = $this->db->query("SELECT *,SUM(bill_meterUsed) as currBill ,SUM(bill_currBill) AS totalBill, SUM(bill_totalUsage) as totalUsage, MAX(bill_numOfRead) as bill_numOfRead FROM bill
        //             LEFT JOIN meter ON meter.mtr_no=bill.Meter_mtr_no
        //             LEFT JOIN reading ON reading.Read_no=bill.reading_read_no
        //             WHERE Mtr_no = $Mtr_id
        //             AND bill_no > $Bill_no");
        //     return $query->row_array();
        // }

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

        public function getLatestReadDate($Mtr_id)
        {
            $query = $this->db->query("SELECT * FROM meter, reading
                WHERE meter.Mtr_no = reading.Meter_Mtr_no
                AND meter.Mtr_id = $Mtr_id
                ORDER BY reading.Read_no DESC");
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

        public function get_latest_trans($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(transaction_details.reading_Read_no) as Read_no FROM meter, reading, transaction_details
                WHERE meter.Mtr_no=reading.Meter_Mtr_no
                AND reading.Read_no=transaction_details.reading_Read_no
                AND meter.Mtr_id = $Mtr_id");
            return $query->row()->Read_no ?? 0;
        }

        public function get_noRead($month, $year)
        {
            $query = $this->db->query("SELECT m.Mtr_id, m.Mtr_no, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name,
                                        concat(c.Cons_zone,' ',c.Cons_barangay,' ',c.Cons_province) as address
                                        FROM consumer c
                                        LEFT JOIN meter m ON m.consumer_Cons_no=c.Cons_no
                                        WHERE (IFNULL((SELECT MAX(b.bill_no) AS bill_no FROM bill b
                                                WHERE b.bill_date LIKE '%$month%' AND b.bill_date LIKE '%$year%'
                                                AND b.Meter_Mtr_no = m.Mtr_no),0)) = 0
                                        AND m.Mtr_status = 0
                                        GROUP BY c.Cons_no");
            return $query->result_array();
        }

        public function get_noRead_mtrID($month, $year, $Mtr_id)
        {
            $query = $this->db->query("SELECT m.Mtr_id, m.Mtr_no, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name,
                                        concat(c.Cons_zone,' ',c.Cons_barangay,' ',c.Cons_province) as address
                                        FROM consumer c
                                        LEFT JOIN meter m ON m.consumer_Cons_no=c.Cons_no
                                        WHERE (IFNULL((SELECT MAX(b.bill_no) AS bill_no FROM bill b
                                                WHERE b.bill_date LIKE '%$month%' AND b.bill_date LIKE '%$year%'
                                                AND b.Meter_Mtr_no = m.Mtr_no),0)) != 0
                                        AND m.Mtr_id = $Mtr_id
                                        GROUP BY c.Cons_no");
            return $query->result_array();
        }

        public function toBeDC($Mtr_id)
        {
            $query = $this->db->query("SELECT 
                                        m.Mtr_id,m.Mtr_no, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name,
                                        concat(c.Cons_zone,' ',c.Cons_barangay,' ',c.Cons_province) as Cons_address,
                                        (b1.bill_currBill - (SELECT b2.bill_prevBill FROM bill b2
                                                             WHERE b2.bill_no > IFNULL((SELECT MAX(b3.bill_no) AS bill_no FROM transaction t
                                                                                       JOIN bill b3 ON b3.bill_no=t.bill_bill_no
                                                                                       WHERE b3.Meter_Mtr_no = b2.Meter_Mtr_no), 0) 
                                                             AND b2.bill_numOfRead = 1 
                                                             AND b2.Meter_Mtr_no = $Mtr_id)) as bill_meterUsed, 
                                        b1.bill_totalUsage
                                    FROM bill b1
                                    JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
                                    JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
                                    WHERE b1.bill_no > IFNULL((SELECT MAX(b2.bill_no) AS bill_no FROM transaction t
                                                            JOIN bill b2 ON b2.bill_no=t.bill_bill_no
                                                            WHERE b2.Meter_Mtr_no = b1.Meter_Mtr_no), 0)
                                    AND b1.bill_numOfRead = 3
                                    AND m.Mtr_id = $Mtr_id 
                                    AND m.Mtr_status != 1");
            return $query->result_array();
        }

        public function get_previousReading($Mtr_id)
        {
            $query = $this->db->query("SELECT SUM(bill_meterUsed) as meterUsed FROM bill,meter
                                        WHERE bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.Mtr_id = $Mtr_id");
            return $query->row()->meterUsed;
        }

        public function ifPaid_check($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(transaction.bill_bill_no) as bill_no FROM transaction
            INNER JOIN bill ON bill.bill_no=transaction.bill_bill_no
            INNER JOIN meter ON meter.Mtr_no=bill.Meter_Mtr_no
            WHERE meter.Mtr_id = $Mtr_id");
            return $query->row()->bill_no??0;
        }
    }
?>