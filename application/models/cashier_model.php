<?php

    class cashier_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function add_transaction($data)
        {
            return $this->db->insert_batch('transaction', $data);
        }

        public function get_trans()
        {
            $this->db->select('*');
            $this->db->from('transaction,bill,employee');
            $this->db->where('transaction.Employee_Emp_no = employee.Emp_no');
            $this->db->where('transaction.bill_bill_no = bill.bill_no');

            $query = $this->db->get();
            return $query->result();
        }

        public function get_consumerNameR($Cons_name)
        {

            return $this->db->query("SELECT *
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'")->row_array();
        }

        public function get_record($Mtr_id, $Bill_no)
        {
            $query = $this->db->query("SELECT * FROM bill,reading,meter,consumer
                WHERE bill.reading_read_no = reading.read_no
                AND bill.Meter_Mtr_no = meter.Mtr_no
                AND meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_id = $Mtr_id
                AND bill.bill_no >= $Bill_no");

                return $query->result_array();
        }

        public function get_records($Mtr_id, $Bill_no)
        {
            $query = $this->db->query("SELECT * FROM bill,reading,meter,consumer,cubic
                WHERE bill.reading_read_no = reading.read_no
                AND bill.Meter_Mtr_no = meter.Mtr_no
                AND meter.consumer_Cons_no = consumer.Cons_no
                AND bill.Cubic_Cubic_no = cubic.Cubic_no
                AND meter.Mtr_no = $Mtr_id
                AND bill.bill_no >= $Bill_no");

                return $query->result_array();
        }

        public function get_Reading($Mtr_id)
        {
            $query = $this->db->query("SELECT bill.bill_no FROM bill,meter
                WHERE bill.Meter_Mtr_no = meter.Mtr_no
                AND meter.Mtr_id = $Mtr_id");

                return $query->result_array();
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
        public function ifPaid($Mtr_id, $Bill_no)
        {
            $query = $this->db->query("SELECT MIN(bill.bill_no) as bill_no FROM bill
                                    INNER JOIN meter ON meter.Mtr_no=bill.Meter_Mtr_no
                                    WHERE meter.Mtr_id = $Mtr_id
                                    AND bill_no > $Bill_no ");
            return $query->row()->bill_no;
        }

        public function ifPaids($Mtr_id, $Bill_no)
        {
            $query = $this->db->query("SELECT MIN(bill.bill_no) as bill_no FROM bill
                                    INNER JOIN meter ON meter.Mtr_no=bill.Meter_Mtr_no
                                    WHERE meter.Mtr_no = $Mtr_id
                                    AND bill_no > $Bill_no ");
            return $query->row()->bill_no;
        }

        public function ifPaid_check($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(transaction.bill_bill_no) as bill_no FROM transaction
            INNER JOIN bill ON bill.bill_no=transaction.bill_bill_no
            INNER JOIN meter ON meter.Mtr_no=bill.Meter_Mtr_no
            WHERE meter.Mtr_id = $Mtr_id");
            return $query->row()->bill_no??0;
        }

        public function ifPaid_checks($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(transaction.bill_bill_no) as bill_no FROM transaction
            INNER JOIN bill ON bill.bill_no=transaction.bill_bill_no
            INNER JOIN meter ON meter.Mtr_no=bill.Meter_Mtr_no
            WHERE meter.Mtr_no = $Mtr_id");
            return $query->row()->bill_no??0;
        }

        public function get_max($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(t.Trans_no) AS Trans_no, t.Trans_amount FROM transaction t
            JOIN bill b on b.bill_no=t.bill_bill_no
            JOIN meter m ON m.Mtr_no=b.Meter_Mtr_no
            WHERE m.Mtr_id = $Mtr_id
            GROUP BY t.Trans_no 
            ORDER BY t.Trans_no DESC LIMIT 1");

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

        public function get_consumerName()
        {
            $query = $this->db->query("SELECT *,concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name FROM consumer,meter,bill,transaction
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND bill.Meter_Mtr_no = meter.Mtr_no
                AND transaction.bill_bill_no = bill.bill_no
                AND meter.Mtr_status != 1
                GROUP BY consumer.Cons_no");

            return $query->result();

        }

        public function readNotPaid()
        {
            $query = $this->db->query("SELECT m.Mtr_id, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name,
                                                concat(c.Cons_zone,' ',c.Cons_barangay,' ',c.Cons_province) as Cons_address,
                                                SUM(b1.bill_meterUsed) as bill_meterUsed, SUM(b1.bill_currUsage) as bill_currUsage
                                        FROM bill b1
                                        JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
                                        JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
                                        WHERE b1.bill_no > IFNULL((SELECT MAX(b2.bill_no) AS bill_no FROM transaction t
                                                            JOIN bill b2 ON b2.bill_no=t.bill_bill_no
                                                            WHERE b2.Meter_Mtr_no = b1.Meter_Mtr_no), 0)
                                        GROUP BY c.Cons_no");
            return $query->result_array();

        }

        public function consumer()
        {
            $this->db->select("*, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Cons_address, MAX(reading.Read_no) as Read_no,MAX(Read_numOfRead) as Read_numOfRead, SUM(Read_currBill) as Read_prevBill");
            $this->db->from('meter');
            $this->db->join('consumer','meter.consumer_Cons_no=consumer.Cons_no');
            $this->db->join('reading','reading.Meter_Mtr_no=meter.Mtr_no');
            $this->db->join('rate','reading.rate_Rate_no=rate.Rate_no');
            $this->db->join('transaction','transaction.meter_Mtr_no=meter.Mtr_no', 'left');
            $this->db->group_by('consumer.Cons_no');
            
            $query = $this->db->get();
            return $query->result_array();
        }

        public function getMeter($Mtr_id)
        {
            $query = $this->db->query("SELECT * FROM meter,consumer 
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_id = $Mtr_id");
            return $query->row_array();
        }

        // public function get_Paid()
        // {
        //     $query = $this->db->query("SELECT b1.bill_no, t.Trans_date, m.Mtr_id, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name, 
        //                                     concat(e.Emp_fName,' ',e.Emp_mName,' ',e.Emp_faName) as Emp_name, 
        //                                     (b1.bill_currBill-(SELECT b2.bill_prevBill FROM bill b2
        //                                                      WHERE b2.bill_no < IFNULL((SELECT MAX(b3.bill_no) AS bill_no FROM transaction t
        //                                                                                JOIN bill b3 ON b3.bill_no=t.bill_bill_no
        //                                                                                WHERE b3.Meter_Mtr_no = b2.Meter_Mtr_no), 0) 
        //                                                      AND b2.bill_numOfRead = 1
        //                                                      GROUP BY Mtr_id)) as bill_meterUsed, t.Trans_amount 
        //                                 FROM transaction t
        //                                 JOIN bill b1 ON b1.bill_no=t.bill_bill_no
        //                                 JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
        //                                 JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
        //                                 JOIN employee e ON e.Emp_no=t.Employee_Emp_no
        //                                 GROUP by t.Trans_no");
                
        //     return $query->result_array();
        // }

        public function get_paid()
        {
            $query = $this->db->query("SELECT Trans_date,Mtr_id,concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name,concat(Emp_fName,' ',Emp_mName,' ',Emp_faName) as Emp_name,SUM(bill_meterUsed) AS bill_meterUsed,SUM(bill_currUsage) AS bill_currUsage 

                                        FROM transaction,bill,meter,consumer,employee
                                        
                                        WHERE transaction.bill_bill_no = bill.bill_no
                                        AND bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.consumer_Cons_no = consumer.Cons_no
                                        AND transaction.Employee_Emp_no = employee.Emp_no
                                        GROUP BY Trans_date,Mtr_id");
            return $query->result_array();
        }

        public function get_paids($Cons_name)
        {
            $query = $this->db->query("SELECT Trans_date,Mtr_id,concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name,concat(Emp_fName,' ',Emp_mName,' ',Emp_faName) as Emp_name,SUM(bill_meterUsed) AS bill_meterUsed,SUM(bill_currUsage) AS bill_currUsage 

                                        FROM transaction,bill,meter,consumer,employee
                                        
                                        WHERE transaction.bill_bill_no = bill.bill_no
                                        AND bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.consumer_Cons_no = consumer.Cons_no
                                        AND transaction.Employee_Emp_no = employee.Emp_no
                                        AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'
                                        GROUP BY Trans_date,Mtr_id");
            return $query->result_array();
        }

        public function getPaid($Cons_name)
        {
            // $this->db->select("trans_date, concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, concat(Emp_fName,' ',Emp_mName,' ',Emp_faName) as Emp_name, Trans_amount,bill_currBill");
            // $this->db->from('transaction,bill , meter, employee, consumer');
            // $this->db->where('transaction.bill_bill_no = bill.bill_no');
            // $this->db->where('bill.Meter_Mtr_no = meter.Mtr_no');
            // $this->db->where('transaction.Employee_Emp_no = employee.Emp_no');
            // $this->db->where('meter.consumer_Cons_no = consumer.cons_no');
            // $this->db->group_by('transaction.trans_no');
            // $this->db->where("concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'");
         
            // $query = $this->db->get();
            // return $query->result_array();
            $query = $this->db->query("SELECT b1.bill_no, t.trans_date, m.Mtr_id, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name, 
                                        concat(e.Emp_fName,' ',e.Emp_mName,' ',e.Emp_faName) as Emp_name, 
                                        (b1.bill_currBill-( SELECT b2.bill_prevBill FROM bill b2
                                                            WHERE b2.bill_no = (b1.bill_no - (b1.bill_numOfRead-1)) 
                                        )) as bill_meterUsed, t.Trans_amount 
                                    FROM transaction t
                                    JOIN bill b1 ON b1.bill_no=t.bill_bill_no
                                    JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
                                    JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
                                    JOIN employee e ON e.Emp_no=t.Employee_Emp_no
                                    WHERE concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'
                                    GROUP by t.Trans_no");

            return $query->result_array();
        }

        public function getPaidByDate($from, $to)
        {
            // $query = $this->db->query("SELECT b1.bill_no, t.trans_date, m.Mtr_id, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name, 
            //                                 concat(e.Emp_fName,' ',e.Emp_mName,' ',e.Emp_faName) as Emp_name, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as address, 
            //                                 (b1.bill_currBill-( SELECT b2.bill_prevBill FROM bill b2
            //                                                     WHERE b2.bill_no = (b1.bill_no - (b1.bill_numOfRead-1)) 
            //                                 )) as bill_meterUsed, t.Trans_amount 
            //                             FROM transaction t
            //                             JOIN bill b1 ON b1.bill_no=t.bill_bill_no
            //                             JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
            //                             JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
            //                             JOIN employee e ON e.Emp_no=t.Employee_Emp_no
            //                             WHERE date(trans_date) >= '{$from}'
            //                             AND date(trans_date) <= '{$to}'
            //                             GROUP by t.Trans_no");
                
            // return $query->result_array();
            $query = $this->db->query("SELECT Trans_date,Mtr_id,concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name,concat(Emp_fName,' ',Emp_mName,' ',Emp_faName) as Emp_name,concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as address,SUM(bill_meterUsed) AS bill_meterUsed,SUM(bill_currUsage) AS bill_currUsage 

                                        FROM transaction,bill,meter,consumer,employee
                                        
                                        WHERE transaction.bill_bill_no = bill.bill_no
                                        AND bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.consumer_Cons_no = consumer.Cons_no
                                        AND transaction.Employee_Emp_no = employee.Emp_no
                                        AND date(trans_date) >= '{$from}'
                                        AND date(trans_date) <= '{$to}'
                                        GROUP by Trans_date,Mtr_id");
                
            return $query->result_array();
        }

        public function readConsumer($Mtr_id)
        {
            $query = $this->db->query("SELECT * FROM consumer 
                                    LEFT JOIN meter ON meter.consumer_Cons_no=consumer.Cons_no
                                    WHERE Mtr_id = $Mtr_id
                                    AND Mtr_status = 0");
            return $query->row_array();
        }
    }
?>