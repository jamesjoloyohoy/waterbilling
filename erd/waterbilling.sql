-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 05:26 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waterbilling`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_no` int(11) NOT NULL,
  `Bill_date` varchar(30) NOT NULL,
  `Bill_startDate` varchar(30) NOT NULL,
  `Bill_endDate` varchar(30) NOT NULL,
  `Bill_dueDate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Bill_no`, `Bill_date`, `Bill_startDate`, `Bill_endDate`, `Bill_dueDate`) VALUES
(1, 'September 07', 'August', 'September', 'Fri Sep 27 2019'),
(2, 'September 20', 'August', 'September', 'Mon Sep 30 2019'),
(3, 'September 20', 'August', 'September', 'Thu Oct 10 2019');

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `Cons_no` int(11) NOT NULL,
  `Cons_faName` varchar(30) NOT NULL,
  `Cons_fName` varchar(30) NOT NULL,
  `Cons_mName` varchar(10) NOT NULL,
  `Cons_zone` varchar(50) NOT NULL,
  `Cons_barangay` varchar(50) NOT NULL,
  `Cons_province` varchar(50) NOT NULL,
  `Cons_spouse` varchar(50) NOT NULL,
  `Cons_dApplied` varchar(30) NOT NULL,
  `Cons_status` varchar(15) NOT NULL,
  `Cons_serviceFee` decimal(10,2) NOT NULL,
  `Cons_otherFee` decimal(10,2) NOT NULL,
  `fee_Fee_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`Cons_no`, `Cons_faName`, `Cons_fName`, `Cons_mName`, `Cons_zone`, `Cons_barangay`, `Cons_province`, `Cons_spouse`, `Cons_dApplied`, `Cons_status`, `Cons_serviceFee`, `Cons_otherFee`, `fee_Fee_no`) VALUES
(1, 'Bongo', 'Justine Ryan', 'N.', 'Zone 1', 'Poblacion', 'Manticao, Misamis Oriental', 'None', 'August 31, 2019', 'Residential', '250.00', '0.00', 1),
(2, 'Lapu-lapu', 'Shinya Kaze', 'J.', 'Zone 5', 'Tuod', 'Manticao, Misamis Oriental', 'None', 'August 31, 2019', 'Residential', '300.00', '0.00', 1),
(3, 'Bongo', 'Jelian Ruth', 'N.', 'Zone 5', 'Poblacion', 'Manticao, Misamis Oriental', 'None', 'August 31, 2019', 'Residential', '500.00', '0.00', 1),
(4, 'Orion', 'Dongger', 'O.', 'Zone 10', 'Tuod', 'Manticao, Misamis Oriental', 'None', 'September 05, 2019', 'Residential', '500.00', '0.00', 1),
(5, 'Leyson', 'Analou', 'C.', 'Zone 5', 'Dimakita', 'Manticao, Misamis Oriental', 'None', 'September 07, 2019', 'Residential', '150.00', '200.00', 1),
(6, 'Joloyohoy', 'James', 'O.', 'Zone 5', 'Poblacion', 'Manticao, Misamis Oriental', 'None', 'September 08, 2019', 'Residential', '250.00', '250.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cubic`
--

CREATE TABLE `cubic` (
  `Cubic_no` int(11) NOT NULL,
  `Cubic_meter` decimal(10,2) NOT NULL,
  `Date_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cubic`
--

INSERT INTO `cubic` (`Cubic_no`, `Cubic_meter`, `Date_updated`) VALUES
(1, '5.00', 'September 01, 2019'),
(2, '10.00', 'September 01, 2019'),
(3, '5.00', 'September 01, 2019'),
(4, '100.00', 'September 04, 2019'),
(5, '5.00', 'September 04, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_no` int(11) NOT NULL,
  `Emp_id` int(11) NOT NULL,
  `Emp_fName` varchar(30) NOT NULL,
  `Emp_mName` varchar(10) NOT NULL,
  `Emp_faName` varchar(30) NOT NULL,
  `Emp_address` varchar(50) NOT NULL,
  `Emp_contact` varchar(15) NOT NULL,
  `Emp_username` varchar(30) NOT NULL,
  `Emp_password` varchar(20) NOT NULL,
  `Emp_status` varchar(10) NOT NULL,
  `Acc_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_no`, `Emp_id`, `Emp_fName`, `Emp_mName`, `Emp_faName`, `Emp_address`, `Emp_contact`, `Emp_username`, `Emp_password`, `Emp_status`, `Acc_type`) VALUES
(1, 101, 'James', 'O.', 'Joloyohoy', 'Manticao, Misamis Oriental', '09061875641', 'koyaks', '1111', 'Active', 'SAdmin'),
(2, 102, 'Leomar Dave', 'W.', 'Acain', 'Manticao, Misamis Oriental', '09654654621', 'boyto', '1111', 'Active', 'Admin'),
(3, 103, 'Clysie Cloe', 'W.', 'Acain', 'Manticao, Misamis Oriental', '09653646546', 'clysie', '1111', 'Active', 'Cashier'),
(4, 104, 'Jemille Renz', 'N.', 'Bongo', 'Manticao, Misamis Oriental', '09336346313', 'pamboy', '1111', 'Active', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `Fee_no` int(11) NOT NULL,
  `Connection_fee` decimal(10,2) NOT NULL,
  `Reconnection_fee` decimal(10,2) NOT NULL,
  `Membership_fee` decimal(10,2) NOT NULL,
  `Date_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`Fee_no`, `Connection_fee`, `Reconnection_fee`, `Membership_fee`, `Date_updated`) VALUES
(1, '250.00', '250.00', '150.00', 'August 31, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE `meter` (
  `Mtr_no` int(11) NOT NULL,
  `Mtr_id` int(11) NOT NULL,
  `Mtr_size` decimal(10,2) NOT NULL,
  `Mtr_status` varchar(45) NOT NULL,
  `consumer_Cons_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`Mtr_no`, `Mtr_id`, `Mtr_size`, `Mtr_status`, `consumer_Cons_no`) VALUES
(1, 6301, '21.35', 'Connect', 1),
(2, 9687, '32.32', 'Connect', 2),
(3, 6354, '32.46', 'Connect', 3),
(4, 6962, '23.13', 'Disconnect', 4),
(5, 5632, '23.01', 'Disconnect', 5),
(6, 3210, '32.01', 'Disconnect', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `Rate_no` int(11) NOT NULL,
  `Rate_prevUsage` decimal(10,2) NOT NULL,
  `Rate_currUsage` decimal(10,2) NOT NULL,
  `Rate_totalUsage` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`Rate_no`, `Rate_prevUsage`, `Rate_currUsage`, `Rate_totalUsage`) VALUES
(1, '0.00', '500.00', '500.00'),
(2, '0.00', '250.00', '250.00'),
(3, '0.00', '500.00', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `reading`
--

CREATE TABLE `reading` (
  `Read_no` int(11) NOT NULL,
  `Read_date` varchar(30) NOT NULL,
  `Read_prevBill` decimal(10,2) NOT NULL,
  `Read_currBill` decimal(10,2) NOT NULL,
  `Read_meterUsed` decimal(10,2) NOT NULL,
  `Read_meterReader` varchar(50) NOT NULL,
  `Read_numOfRead` varchar(3) NOT NULL,
  `Meter_Mtr_no` int(11) NOT NULL,
  `bill_Bill_no` int(11) NOT NULL,
  `rate_Rate_no` int(11) NOT NULL,
  `Cubic_Cubic_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reading`
--

INSERT INTO `reading` (`Read_no`, `Read_date`, `Read_prevBill`, `Read_currBill`, `Read_meterUsed`, `Read_meterReader`, `Read_numOfRead`, `Meter_Mtr_no`, `bill_Bill_no`, `rate_Rate_no`, `Cubic_Cubic_no`) VALUES
(1, 'Sat Sep 07 2019', '0.00', '100.00', '100.00', 'Jemelli Renz N. Bongo', '1', 1, 1, 1, 5),
(2, 'Tue Sep 10 2019', '0.00', '50.00', '50.00', 'Jemelli Renz N. Bongo', '1', 1, 2, 2, 5),
(3, 'Fri Sep 20 2019', '0.00', '100.00', '100.00', 'Jemelli Renz N. Bongo', '1', 1, 3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Trans_no` int(11) NOT NULL,
  `Trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Trans_amount` decimal(10,2) NOT NULL,
  `Employee_Emp_no` int(11) NOT NULL,
  `meter_Mtr_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Trans_no`, `Trans_date`, `Trans_amount`, `Employee_Emp_no`, `meter_Mtr_no`) VALUES
(1, '2018-12-31 16:00:00', '500.00', 3, 1),
(2, '2019-01-31 16:00:00', '250.00', 3, 1),
(3, '2019-03-01 06:41:42', '500.00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `Trans_no` int(11) NOT NULL,
  `reading_Read_no` int(11) NOT NULL,
  `transaction_Trans_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`Trans_no`, `reading_Read_no`, `transaction_Trans_no`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_no`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`Cons_no`),
  ADD KEY `fk_consumer_fee1` (`fee_Fee_no`);

--
-- Indexes for table `cubic`
--
ALTER TABLE `cubic`
  ADD PRIMARY KEY (`Cubic_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_no`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`Fee_no`);

--
-- Indexes for table `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`Mtr_no`),
  ADD KEY `fk_meter_consumer1` (`consumer_Cons_no`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`Rate_no`);

--
-- Indexes for table `reading`
--
ALTER TABLE `reading`
  ADD PRIMARY KEY (`Read_no`),
  ADD KEY `fk_Reading_Meter1` (`Meter_Mtr_no`),
  ADD KEY `fk_reading_bill1` (`bill_Bill_no`),
  ADD KEY `fk_reading_rate1` (`rate_Rate_no`),
  ADD KEY `fk_reading_Cubic1` (`Cubic_Cubic_no`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Trans_no`),
  ADD KEY `fk_Transaction_Employee1` (`Employee_Emp_no`),
  ADD KEY `fk_transaction_meter1` (`meter_Mtr_no`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`Trans_no`),
  ADD KEY `fk_transaction_details_reading1` (`reading_Read_no`),
  ADD KEY `fk_transaction_details_transaction1` (`transaction_Trans_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Bill_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `Cons_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cubic`
--
ALTER TABLE `cubic`
  MODIFY `Cubic_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `Fee_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `Mtr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `Rate_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reading`
--
ALTER TABLE `reading`
  MODIFY `Read_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Trans_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `Trans_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumer`
--
ALTER TABLE `consumer`
  ADD CONSTRAINT `fk_consumer_fee1` FOREIGN KEY (`fee_Fee_no`) REFERENCES `fee` (`Fee_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `meter`
--
ALTER TABLE `meter`
  ADD CONSTRAINT `fk_meter_consumer1` FOREIGN KEY (`consumer_Cons_no`) REFERENCES `consumer` (`Cons_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reading`
--
ALTER TABLE `reading`
  ADD CONSTRAINT `fk_Reading_Meter1` FOREIGN KEY (`Meter_Mtr_no`) REFERENCES `meter` (`Mtr_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reading_Cubic1` FOREIGN KEY (`Cubic_Cubic_no`) REFERENCES `cubic` (`Cubic_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reading_bill1` FOREIGN KEY (`bill_Bill_no`) REFERENCES `bill` (`Bill_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reading_rate1` FOREIGN KEY (`rate_Rate_no`) REFERENCES `rate` (`Rate_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_Transaction_Employee1` FOREIGN KEY (`Employee_Emp_no`) REFERENCES `employee` (`Emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_meter1` FOREIGN KEY (`meter_Mtr_no`) REFERENCES `meter` (`Mtr_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `fk_transaction_details_reading1` FOREIGN KEY (`reading_Read_no`) REFERENCES `reading` (`Read_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_details_transaction1` FOREIGN KEY (`transaction_Trans_no`) REFERENCES `transaction` (`Trans_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
