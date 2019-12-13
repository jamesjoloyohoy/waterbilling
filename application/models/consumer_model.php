<?php

    class consumer_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_Paid($Cons_name)
        {
            $query = $this->db->query("SELECT Trans_date,Mtr_id,concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name,concat(Emp_fName,' ',Emp_mName,' ',Emp_faName) as Emp_name,SUM(bill_meterUsed) AS bill_meterUsed,SUM(bill_currUsage) AS bill_currUsage 

                    FROM transaction,bill,meter,consumer,employee
                    
                    WHERE transaction.bill_bill_no = bill.bill_no
                    AND bill.Meter_Mtr_no = meter.Mtr_no
                    AND meter.consumer_Cons_no = consumer.Cons_no
                    AND transaction.Employee_Emp_no = employee.Emp_no
                    AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'
                    GROUP by Trans_date");

            return $query->result_array();
        }

        public function readNotPaid($Cons_name)
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
                                        AND concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) = '{$Cons_name}'
                                        GROUP BY c.Cons_no");
            return $query->result_array();

        }

        public function get_consumerName($Cons_name)
        {

            return $this->db->query("SELECT *
                FROM consumer,meter
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'")->row_array();
        }

        public function get_latest_trans($Cons_name)
        {
            $query = $this->db->query("SELECT Cons_fName, Cons_mName, Cons_faName, MAX(transaction_details.reading_Read_no) as Read_no FROM meter, reading, transaction_details, consumer
                WHERE meter.consumer_Cons_no = consumer.Cons_no
                AND meter.Mtr_no=reading.Meter_Mtr_no
                AND reading.Read_no=transaction_details.reading_Read_no
                AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'");
            return $query->row()->Read_no ?? 0;
        }

        // public function get_meter($Cons_name, $Read_no)
        // {
        //     $query = $this->db->query("SELECT * FROM meter,consumer,reading,bill,rate,cubic 
        //         WHERE meter.consumer_Cons_no = consumer.Cons_no
        //         AND meter.Mtr_no = reading.Meter_Mtr_no
        //         AND bill.Bill_no = reading.bill_Bill_no
        //         AND rate.Rate_no = reading.rate_Rate_no
        //         AND reading.Cubic_Cubic_no = cubic.Cubic_no
        //         AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'
        //         AND reading.Read_no > $Read_no
        //     ");

        //     return $query->result_array();
        // }

        public function readConsumer($Cons_name)
        {
            $query = $this->db->query("SELECT *, concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) as Cons_name,
                                    concat(Cons_zone,' ',Cons_barangay,' ',Cons_province) as Cons_address 
                                    FROM consumer 
                                    LEFT JOIN meter ON meter.consumer_Cons_no=consumer.Cons_no
                                    WHERE concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'");
            return $query->row_array();
        }

        public function readBalance($Cons_name)
        {
            $query = $this->db->query("SELECT *, concat(c.Cons_fName,' ',c.Cons_mName,' ',c.Cons_faName) as Cons_name,
                                                concat(c.Cons_zone,' ',c.Cons_barangay,' ',c.Cons_province) as Cons_address
                                        FROM bill b1
                                        JOIN meter m ON m.Mtr_no=b1.Meter_Mtr_no
                                        JOIN consumer c ON c.Cons_no=m.consumer_Cons_no
                                        JOIN reading r ON r.read_no=b1.reading_read_no
                                        WHERE b1.bill_no > IFNULL((SELECT MAX(b2.bill_no) AS bill_no FROM transaction t
                                                            JOIN bill b2 ON b2.bill_no=t.bill_bill_no
                                                            WHERE b2.Meter_Mtr_no = b1.Meter_Mtr_no), 0)
                                        AND concat(Cons_fName,' ',Cons_mName,' ',Cons_faName) = '{$Cons_name}'");
            return $query->result_array();

        }

    }
?>