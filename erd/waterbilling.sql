-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 06:01 AM
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
  `bill_no` int(11) NOT NULL,
  `bill_date` varchar(30) NOT NULL,
  `bill_prevBill` int(11) NOT NULL,
  `bill_currBill` int(11) NOT NULL,
  `bill_meterUsed` int(11) NOT NULL,
  `bill_currUsage` int(11) NOT NULL,
  `bill_meterReader` varchar(50) NOT NULL,
  `bill_numOfRead` varchar(3) NOT NULL,
  `Meter_Mtr_no` int(11) NOT NULL,
  `Cubic_Cubic_no` int(11) NOT NULL,
  `reading_read_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_no`, `bill_date`, `bill_prevBill`, `bill_currBill`, `bill_meterUsed`, `bill_currUsage`, `bill_meterReader`, `bill_numOfRead`, `Meter_Mtr_no`, `Cubic_Cubic_no`, `reading_read_no`) VALUES
(35, 'Tue Jan 22 2019', 0, 50, 50, 250, 'Jemille Renz N. Bongo', '1', 3, 3, 36),
(36, 'Tue Jan 22 2019', 0, 85, 85, 425, 'Jemille Renz N. Bongo', '1', 1, 3, 37),
(37, 'Tue Jan 22 2019', 0, 65, 65, 325, 'Jemille Renz N. Bongo', '1', 2, 3, 38),
(38, 'Wed Feb 20 2019', 85, 150, 65, 325, 'Jemille Renz N. Bongo', '1', 1, 3, 39),
(39, 'Wed Feb 20 2019', 65, 120, 55, 275, 'Jemille Renz N. Bongo', '1', 2, 3, 40),
(40, 'Wed Feb 20 2019', 50, 100, 50, 250, 'Jemille Renz N. Bongo', '1', 3, 3, 41),
(42, 'Fri Mar 22 2019', 100, 150, 50, 250, 'Jemille Renz N. Bongo', '1', 3, 3, 43),
(43, 'Fri Mar 22 2019', 150, 210, 60, 300, 'Jemille Renz N. Bongo', '1', 1, 3, 44),
(44, 'Fri Mar 22 2019', 120, 190, 70, 350, 'Jemille Renz N. Bongo', '1', 2, 3, 45),
(45, 'Wed Apr 24 2019', 210, 260, 50, 250, 'Jemille Renz N. Bongo', '2', 1, 3, 46),
(46, 'Wed Apr 24 2019', 190, 250, 60, 300, 'Jemille Renz N. Bongo', '2', 2, 3, 47),
(47, 'Wed Apr 24 2019', 150, 220, 70, 350, 'Jemille Renz N. Bongo', '2', 3, 3, 48),
(48, 'Wed May 22 2019', 220, 250, 30, 150, 'Jemille Renz N. Bongo', '1', 3, 3, 49),
(49, 'Wed May 22 2019', 260, 300, 40, 200, 'Jemille Renz N. Bongo', '1', 1, 3, 50),
(50, 'Wed May 22 2019', 250, 300, 50, 250, 'Jemille Renz N. Bongo', '1', 2, 3, 51),
(51, 'Thu Jun 20 2019', 250, 300, 50, 250, 'Jemille Renz N. Bongo', '2', 3, 3, 52),
(52, 'Thu Jun 20 2019', 300, 350, 50, 250, 'Jemille Renz N. Bongo', '2', 1, 3, 53),
(53, 'Thu Jun 20 2019', 300, 350, 50, 250, 'Jemille Renz N. Bongo', '2', 2, 3, 54),
(54, 'Thu Jul 25 2019', 300, 350, 50, 250, 'Jemille Renz N. Bongo', '3', 3, 3, 55),
(55, 'Thu Jul 25 2019', 350, 400, 50, 250, 'Jemille Renz N. Bongo', '3', 1, 3, 56),
(56, 'Thu Jul 25 2019', 350, 400, 50, 250, 'Jemille Renz N. Bongo', '3', 2, 3, 57),
(57, 'Fri Aug 23 2019', 350, 450, 100, 500, 'Jemille Renz N. Bongo', '1', 3, 3, 58),
(58, 'Fri Sep 20 2019', 450, 550, 100, 1000, 'Jemille Renz N. Bongo', '2', 3, 4, 59),
(59, 'Thu Oct 24 2019', 550, 700, 150, 1500, 'Jemille Renz N. Bongo', '3', 3, 4, 60),
(60, 'Wed Nov 20 2019', 400, 450, 50, 500, 'Jemille Renz N. Bongo', '1', 1, 4, 61);

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
  `fee_Fee_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`Cons_no`, `Cons_faName`, `Cons_fName`, `Cons_mName`, `Cons_zone`, `Cons_barangay`, `Cons_province`, `Cons_spouse`, `Cons_dApplied`, `Cons_status`, `Cons_serviceFee`, `fee_Fee_no`) VALUES
(1, 'Selerio', 'Ryan', 'Q.', 'Zone 5', 'Poblacion', 'Manticao, Misamis Oriental', 'None', 'November 29, 2019', 'Residential', '50.00', 1),
(2, 'Cagubcub', 'Jake', 'L.', 'Zone 5', 'Tuod', 'Manticao, Misamis Oriental', 'None', 'November 29, 2019', 'Residential', '150.00', 1),
(3, 'Bongo', 'Justine Ryan', 'N.', 'Zone 9', 'Suok-Suok', 'Manticao, Misamis Oriental', 'None', 'November 29, 2019', 'Residential', '0.00', 1);

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
(1, '5.00', 'November 29, 2019'),
(2, '10.00', 'June 20, 2019'),
(3, '5.00', 'July 23, 2019'),
(4, '10.00', 'August 23, 2019');

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
(2, 102, 'Leomar Dave', 'W.', 'Acain', 'Manticao, Misamis Oriental', '09351765984', 'boyto', '1111', 'Active', 'Admin'),
(3, 103, 'Jemille Renz', 'N.', 'Bongo', 'Manticao, Misamis Oriental', '09176532698', 'pamboy', '1111', 'Active', 'Staff'),
(4, 104, 'Clysie Cloe', 'W.', 'Acain', 'Manticao, Misamis Oriental', '09652131566', 'clysie', '1111', 'Active', 'Cashier'),
(5, 105, 'Analou', 'C.', 'Leyson', 'Manticao, Misamis Oriental', '09321326565', 'user5', 'user5', 'Active', 'Cashier');

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
(1, '250.00', '250.00', '150.00', 'November 29, 2019');

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE `meter` (
  `Mtr_no` int(11) NOT NULL,
  `Mtr_id` int(11) NOT NULL,
  `Mtr_size` decimal(10,2) NOT NULL,
  `Mtr_status` int(11) NOT NULL,
  `consumer_Cons_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`Mtr_no`, `Mtr_id`, `Mtr_size`, `Mtr_status`, `consumer_Cons_no`) VALUES
(1, 3698, '20.00', 0, 1),
(2, 3214, '20.00', 0, 2),
(3, 6301, '20.00', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reading`
--

CREATE TABLE `reading` (
  `read_no` int(11) NOT NULL,
  `read_date` varchar(30) NOT NULL,
  `read_startDate` varchar(30) NOT NULL,
  `read_endDate` varchar(30) NOT NULL,
  `read_dueDate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reading`
--

INSERT INTO `reading` (`read_no`, `read_date`, `read_startDate`, `read_endDate`, `read_dueDate`) VALUES
(36, 'January 22', 'December', 'January', 'Mon Feb 11 2019'),
(37, 'January 22', 'December', 'January', 'Mon Feb 11 2019'),
(38, 'January 22', 'December', 'January', 'Mon Feb 11 2019'),
(39, 'February 20', 'January', 'February', 'Tue Mar 12 2019'),
(40, 'February 20', 'January', 'February', 'Tue Mar 12 2019'),
(41, 'February 20', 'January', 'February', 'Tue Mar 12 2019'),
(42, 'March 22', 'January', 'March', 'Tue Mar 12 2019'),
(43, 'March 22', 'February', 'March', 'Thu Apr 11 2019'),
(44, 'March 22', 'February', 'March', 'Thu Apr 11 2019'),
(45, 'March 22', 'February', 'March', 'Thu Apr 11 2019'),
(46, 'April 24', 'March', 'April', 'Tue May 14 2019'),
(47, 'April 24', 'March', 'April', 'Tue May 14 2019'),
(48, 'April 24', 'March', 'April', 'Tue May 14 2019'),
(49, 'May 22', 'April', 'May', 'Tue Jun 11 2019'),
(50, 'May 22', 'April', 'May', 'Tue Jun 11 2019'),
(51, 'May 22', 'April', 'May', 'Tue Jun 11 2019'),
(52, 'June 20', 'May', 'June', 'Wed Jul 10 2019'),
(53, 'June 20', 'May', 'June', 'Wed Jul 10 2019'),
(54, 'June 20', 'May', 'June', 'Wed Jul 10 2019'),
(55, 'July 25', 'June', 'July', 'Wed Aug 14 2019'),
(56, 'July 25', 'June', 'July', 'Wed Aug 14 2019'),
(57, 'July 25', 'June', 'July', 'Wed Aug 14 2019'),
(58, 'August 23', 'July', 'August', 'Thu Sep 12 2019'),
(59, 'September 20', 'August', 'September', 'Thu Oct 10 2019'),
(60, 'October 24', 'September', 'October', 'Wed Nov 13 2019'),
(61, 'November 20', 'October', 'November', 'Tue Dec 10 2019');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Trans_no` int(11) NOT NULL,
  `Trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Employee_Emp_no` int(11) NOT NULL,
  `bill_bill_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Trans_no`, `Trans_date`, `Employee_Emp_no`, `bill_bill_no`) VALUES
(30, '2019-01-01 03:40:59', 4, 35),
(31, '2019-02-01 03:41:14', 4, 36),
(32, '2019-03-01 03:41:36', 4, 37),
(33, '2019-04-01 03:44:46', 4, 40),
(34, '2019-05-01 03:44:59', 4, 38),
(35, '2019-06-01 03:45:11', 4, 39),
(36, '2019-07-01 03:52:31', 4, 42),
(37, '2019-08-01 03:52:31', 4, 47),
(38, '2019-09-01 03:52:48', 4, 43),
(39, '2019-10-01 03:52:48', 4, 45),
(40, '2019-11-01 03:53:02', 4, 44),
(41, '2019-12-01 03:53:02', 4, 46),
(42, '2019-07-25 06:15:15', 4, 48),
(43, '2019-07-25 06:15:15', 4, 51),
(44, '2019-07-25 06:15:15', 4, 54),
(45, '2019-07-25 06:15:37', 4, 49),
(46, '2019-07-25 06:15:37', 4, 52),
(47, '2019-07-25 06:15:37', 4, 55),
(48, '2019-07-25 06:15:50', 4, 50),
(49, '2019-07-25 06:15:50', 4, 53),
(50, '2019-07-25 06:15:50', 4, 56),
(51, '2019-11-20 06:31:13', 4, 57),
(52, '2019-11-20 06:31:13', 4, 58),
(53, '2020-01-01 06:31:13', 4, 59);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `fk_Reading_Meter1` (`Meter_Mtr_no`),
  ADD KEY `fk_reading_Cubic1` (`Cubic_Cubic_no`),
  ADD KEY `fk_bill_reading1` (`reading_read_no`);

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
-- Indexes for table `reading`
--
ALTER TABLE `reading`
  ADD PRIMARY KEY (`read_no`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Trans_no`),
  ADD KEY `fk_Transaction_Employee1` (`Employee_Emp_no`),
  ADD KEY `fk_transaction_bill1` (`bill_bill_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `Cons_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cubic`
--
ALTER TABLE `cubic`
  MODIFY `Cubic_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `Fee_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `Mtr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reading`
--
ALTER TABLE `reading`
  MODIFY `read_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Trans_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_Reading_Meter1` FOREIGN KEY (`Meter_Mtr_no`) REFERENCES `meter` (`Mtr_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bill_reading1` FOREIGN KEY (`reading_read_no`) REFERENCES `reading` (`read_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reading_Cubic1` FOREIGN KEY (`Cubic_Cubic_no`) REFERENCES `cubic` (`Cubic_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_Transaction_Employee1` FOREIGN KEY (`Employee_Emp_no`) REFERENCES `employee` (`Emp_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_bill1` FOREIGN KEY (`bill_bill_no`) REFERENCES `bill` (`bill_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
