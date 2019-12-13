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
            $this->db->where("Mtr_status = '0'");

            $query = $this->db->get();
            return $query->result();
        }

        function count_connected()
        {
            $query = $this->db->query("SELECT COUNT(Cons_no) as Cons_no 
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND Mtr_status = '0'");

            return $query->row_array();
        }

        public function get_consumerDis()
        {
            $this->db->select('*');
            $this->db->from('consumer,meter');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where("Mtr_status = '1'");

            $query = $this->db->get();
            return $query->result();
        }

        function count_disconnected()
        {
            $query = $this->db->query("SELECT COUNT(Cons_no) as Cons_no 
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND Mtr_status = '1'");

            return $query->row_array();
        }

        public function noticeOfDisconnection()
        {
            // $this->db->select('*, SUM(Read_currBill) as Read_currBill, SUM(Rate_totalUsage)');
            // $this->db->from('consumer,meter,reading,rate');
            // $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            // $this->db->where('reading.Meter_Mtr_no = meter.Mtr_no');
            // $this->db->where('reading.rate_Rate_no = rate.Rate_no');
            // $this->db->where('Read_numOfRead', 3);
            // $this->db->group_by('Mtr_id');

            // $query = $this->db->query("SELECT *, SUM(Read_currBill) as Read_currBill, SUM(Rate_totalUsage) as Rate_totalUsage,MAX(Read_numOfRead) as isNod
            //                 FROM consumer,meter,reading,rate
            //                 WHERE consumer.Cons_no = meter.consumer_Cons_no
            //                 AND reading.Meter_Mtr_no = meter.Mtr_no
            //                 AND reading.rate_Rate_no = rate.Rate_no
            //                 GROUP BY meter.Mtr_id");
            // return $query->result_array();

            $query = $this->db->query("SELECT *, SUM(Read_currBill) as Read_currBill, SUM(Rate_totalUsage) as Rate_totalUsage,MAX(Read_numOfRead) as isNod
                                    FROM consumer,meter m1,reading,rate
                                    WHERE consumer.Cons_no = m1.consumer_Cons_no
                                    AND reading.Meter_Mtr_no = m1.Mtr_no
                                    AND reading.rate_Rate_no = rate.Rate_no
                                    AND reading.Read_no > (SELECT MAX(transaction_details.reading_Read_no) as Read_no FROM meter m2
                                                        LEFT JOIN reading ON m2.Mtr_no=reading.Meter_Mtr_no
                                                        LEFT JOIN transaction_details ON reading.Read_no=transaction_details.reading_Read_no
                                                        WHERE Mtr_id = m1.Mtr_id
                                                        GROUP BY Mtr_id) 
                                    GROUP BY m1.Mtr_id");
            return $query->result_array();
        }

        public function nodForNoTrans()
        {
            $query = $this->db->query("SELECT *, SUM(Read_currBill) as Read_currBill, SUM(Rate_totalUsage) as Rate_totalUsage,MAX(Read_numOfRead) as isNod
                                    FROM consumer,meter m1,reading,rate
                                    WHERE consumer.Cons_no = m1.consumer_Cons_no
                                    AND reading.Meter_Mtr_no = m1.Mtr_no
                                    AND reading.rate_Rate_no = rate.Rate_no
                                    AND m1.Mtr_id NOT IN (SELECT m2.Mtr_id FROM meter m2
                                                    LEFT JOIN reading ON reading.Meter_Mtr_no = m2.Mtr_no
                                                    WHERE reading.Read_no >= (SELECT MAX(transaction_details.reading_Read_no) as Read_no FROM meter m3
                                                                            LEFT JOIN reading ON m3.Mtr_no=reading.Meter_Mtr_no
                                                                            LEFT JOIN transaction_details ON reading.Read_no=transaction_details.reading_Read_no
                                                                            WHERE Mtr_id = m2.Mtr_id)
                                                    GROUP BY m2.Mtr_id)
                                    GROUP BY m1.Mtr_id");
            return $query->result_array();
        }

        public function disconnect($id)
        {
            $data = array (
                'Mtr_status' => 1
            );
            $this->db->where('Mtr_no', $id);
            return $this->db->update('meter',$data);
        }

        public function connect($id)
        {
            $data = array (
                'Mtr_status' => 0
            );
            $this->db->where('Mtr_no', $id);
            return $this->db->update('meter',$data);
        }

        public function get_byZone($zone)
        {
            return $this->db->query("SELECT * FROM consumer, meter
            where concat(Cons_zone, ' ', Cons_barangay) like '{$zone}'
            AND meter.consumer_Cons_no = consumer.Cons_no
            AND Mtr_status != '1'")->result();
        }

        public function getYear()
        {
            // $query = $this->db->query("SELECT month(Trans_date) as month,year(Trans_date) AS year, SUM(Trans_amount) as amt
            // FROM transaction
            // GROUP BY concat(month(Trans_date),'-',year(Trans_date))  
            // ORDER BY year(Trans_date),month(Trans_date)");
            // return $query->result_array();

            $query = $this->db->query("SELECT month(Trans_date) as month,year(Trans_date) AS year, SUM(bill_currUsage) as amt
                                        FROM transaction,bill
                                        WHERE transaction.bill_bill_no = bill.bill_no
                                        GROUP BY concat(month(Trans_date),'-',year(Trans_date))  
                                        ORDER BY year(Trans_date),month(Trans_date)");
            return $query->result_array();
        }

        public function get_ConsumerInfo($id)
        {
            $this->db->select('*, (Connection_fee + Membership_fee + consumer.Cons_serviceFee) AS fee');
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
            $this->db->where("Mtr_status != 1");
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

        // public function getPaidByDate($from, $to)
        // {
        //     $this->db->select("trans_date, concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Address, Trans_amount, Mtr_id,Cubic_meter");
        //     $this->db->from('transaction, consumer, meter, employee, reading, transaction_details,cubic');
        //     $this->db->where('transaction.meter_Mtr_no = meter.Mtr_no');
        //     $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
        //     $this->db->where('transaction.Employee_Emp_no = employee.Emp_no');
        //     $this->db->where('transaction_details.transaction_Trans_no = transaction.Trans_no');
        //     $this->db->where('transaction_details.reading_Read_no = reading.Read_no');
        //     $this->db->where('cubic.Cubic_no=reading.Cubic_Cubic_no');
        //     $this->db->group_by('transaction.trans_no');
        //     $this->db->where("date(trans_date) >= '{$from}'");
        //     $this->db->where("date(trans_date) <= '{$to}'");

        //     $query = $this->db->get();
        //     return $query->result_array();
        // }

        public function get_notPaid($Mtr_id)
        {
            $this->db->select('*');
            $this->db->from('meter,consumer');
            $this->db->where('meter.consumer_Cons_no = consumer.Cons_no');
            $this->db->where("meter.Mtr_no = $Mtr_id");

            $query = $this->db->get();
            return $query->row_array();
        }

        public function get_latest_trans($Mtr_id)
        {
            $query = $this->db->query("SELECT MAX(transaction_details.reading_Read_no) as Read_no FROM meter, reading, transaction_details
                WHERE meter.Mtr_no=reading.Meter_Mtr_no
                AND reading.Read_no=transaction_details.reading_Read_no
                AND meter.Mtr_no = $Mtr_id");
            return $query->row()->Read_no ?? 0;
        }

        public function readLatestTransactions()
        {
            $query = $this->db->query("SELECT meter.Mtr_id, MAX(transaction_details.reading_Read_no) as Read_no FROM meter, reading, transaction_details
                WHERE meter.Mtr_no=reading.Meter_Mtr_no
                AND reading.Read_no=transaction_details.reading_Read_no
                GROUP BY meter.Mtr_id");
            return $query->result_array();
        }

        public function get_meters($Mtr_id, $Read_no)
        {
            $query = $this->db->query("SELECT * FROM meter,consumer,reading,bill,rate,cubic
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_no = reading.Meter_Mtr_no
                AND bill.Bill_no = reading.bill_Bill_no
                AND rate.Rate_no = reading.rate_Rate_no
                AND reading.Cubic_Cubic_no = cubic.Cubic_no
                AND meter.Mtr_no = $Mtr_id
                AND reading.Read_no > $Read_no
            ");

            return $query->result_array();
        }

        public function get_noticeOfDisconnection()
        {
            // $query = $this->db->query("SELECT 
            //                             m.Mtr_id,m.Mtr_no, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name,
            //                             concat(c.Cons_zone,' ',c.Cons_barangay,' ',c.Cons_province) as Cons_address,
            //                             (b1.bill_currBill-( SELECT b2.bill_prevBill FROM bill b2
            //                                             WHERE b2.bill_no = (b1.bill_no - (b1.bill_numOfRead-1)) 
            //                                             )) as bill_meterUsed, b1.bill_totalUsage
            //                         FROM bill b1
            //                         JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
            //                         JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
            //                         WHERE b1.bill_no > IFNULL((SELECT MAX(b2.bill_no) AS bill_no FROM transaction t
            //                                                 JOIN bill b2 ON b2.bill_no=t.bill_bill_no
            //                                                 WHERE b2.Meter_Mtr_no = b1.Meter_Mtr_no), 0)
            //                         AND b1.bill_numOfRead = 3
            //                         AND m.Mtr_status = 0");

            $query = $this->db->query("SELECT 
                                        m.Mtr_id,m.Mtr_no, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name,
                                        concat(c.Cons_zone,' ',c.Cons_barangay,' ',c.Cons_province) as Cons_address,
                                        SUM(b1.bill_meterUsed) as bill_meterUsed, SUM(b1.bill_currUsage)  as bill_currUsage,
                                        MAX(b1.bill_numOfRead) as bill_numOfRead
                                    FROM bill b1
                                    JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
                                    JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
                                    WHERE b1.bill_no > IFNULL((SELECT MAX(b2.bill_no) AS bill_no FROM transaction t
                                                            JOIN bill b2 ON b2.bill_no=t.bill_bill_no
                                                            WHERE b2.Meter_Mtr_no = b1.Meter_Mtr_no), 0)
                                    AND m.Mtr_status = 0
                                    GROUP BY m.Mtr_no");
                                    
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

        public function dcDate($Mtr_no)
        {
            $query = $this->db->query("SELECT b1.bill_date FROM bill b1
                                    JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
                                    WHERE m.Mtr_no = $Mtr_no
                                    AND b1.bill_no > IFNULL((SELECT MAX(b2.bill_no) AS bill_no FROM transaction t
                                                            JOIN bill b2 ON b2.bill_no=t.bill_bill_no
                                                            WHERE b2.Meter_Mtr_no = b1.Meter_Mtr_no), 0)
                                    AND b1.bill_numOfRead = 3");
            return $query->row()->bill_date;
        }
        
        public function reconnect($Mtr_no)
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
                                        AND m.Mtr_no = $Mtr_no
                                        GROUP BY c.Cons_no");
            return $query->row_array();
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
        
        public function get_consumerName($Cons_name)
        {

            return $this->db->query("SELECT *
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'")->row_array();
        }

        public function getPaidByDate($from, $to)
        {
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

        public function get_log()
        {
            $query = $this->db->query("SELECT bill_date,meter.Mtr_id,CONCAT(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, bill_meterReader, bill_meterUsed, cubic_meter, bill_currUsage
	
                                        FROM bill,meter,consumer,cubic
                                        
                                        WHERE bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.consumer_Cons_no = consumer.Cons_no
                                        AND bill.Cubic_Cubic_no = cubic.Cubic_no
                                        
                                        ORDER BY bill.bill_no");
            return $query->result_array();
        }

        public function get_meterReader()
        {
            $query = $this->db->query("SELECT DISTINCT(bill.bill_meterReader) as bill_meterReader FROM bill");

            return $query->result();
        }

        public function get_logName($meterReader)
        {
            $query = $this->db->query("SELECT *,bill_meterReader FROM bill
                            WHERE bill.bill_meterReader = '{$meterReader}'");

            return $query->row_array();
        }

        public function get_record($meterReader)
        {
            $query = $this->db->query("SELECT bill_date,meter.Mtr_id,CONCAT(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, bill_meterReader, bill_meterUsed, cubic_meter, bill_currUsage
	
                                        FROM bill,meter,consumer,cubic
                                        
                                        WHERE bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.consumer_Cons_no = consumer.Cons_no
                                        AND bill.Cubic_Cubic_no = cubic.Cubic_no
                                        AND bill_meterReader = '{$meterReader}'
                                        
                                        ORDER BY bill.bill_no");
            return $query->result_array();
        }

        public function get_recordByDate($month, $year)
        {
            $query = $this->db->query("SELECT bill_date,meter.Mtr_id,CONCAT(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, bill_meterReader, bill_meterUsed, cubic_meter, bill_currUsage
                                        FROM bill,meter,consumer,cubic
                                        WHERE bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.consumer_Cons_no = consumer.Cons_no
                                        AND bill.Cubic_Cubic_no = cubic.Cubic_no
                                        AND bill_date like '%$month%'
                                        AND bill_date like '%$year%'
                                        ORDER BY bill.bill_no");
            return $query->result_array();
        }

        public function get_record_all($month, $year, $meterReader)
        {
            $query = $this->db->query("SELECT bill_date,meter.Mtr_id,CONCAT(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name, bill_meterReader, bill_meterUsed, cubic_meter, bill_currUsage
                                        FROM bill,meter,consumer,cubic
                                        WHERE bill.Meter_Mtr_no = meter.Mtr_no
                                        AND meter.consumer_Cons_no = consumer.Cons_no
                                        AND bill.Cubic_Cubic_no = cubic.Cubic_no
                                        AND bill_meterReader = '{$meterReader}'
                                        AND bill_date like '%$month%'
                                        AND bill_date like '%$year%'
                                        ORDER BY bill.bill_no");
            return $query->result_array();
        }
    }
?>