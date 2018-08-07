-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 06:09 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csas`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total` (OUT `total` INT)  select sum(ser_tax) INTO total from payment$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalrevenue` (OUT `totalrevenue` INT)  NO SQL
    DETERMINISTIC
SELECT sum(total) INTO totalrevenue from spayment$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_no` int(11) NOT NULL,
  `cust_name` varchar(50) DEFAULT NULL,
  `cust_phn` int(11) DEFAULT NULL,
  `cust_addr` varchar(50) DEFAULT NULL,
  `cust_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_no`, `cust_name`, `cust_phn`, `cust_addr`, `cust_email`) VALUES
(0, '', 0, '', ''),
(11121, 'qwwqw', 21212, 'qqwqw', 'qqssq'),
(12341, 'abhi', 78488, 'tumkur', 'abhi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `date_details`
--

CREATE TABLE `date_details` (
  `cust_no` int(11) NOT NULL,
  `sub_date` date DEFAULT NULL,
  `ret_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date_details`
--

INSERT INTO `date_details` (`cust_no`, `sub_date`, `ret_date`) VALUES
(0, '0000-00-00', '0000-00-00'),
(11121, '2017-11-15', '2017-11-23'),
(12341, '2017-11-15', '2017-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `cust_no` int(11) NOT NULL,
  `dev_type` varchar(50) DEFAULT NULL,
  `cmp_name` varchar(50) DEFAULT NULL,
  `div_ver` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`cust_no`, `dev_type`, `cmp_name`, `div_ver`, `color`) VALUES
(0, '', '', '', ''),
(11121, 'ssaas', 'qss', 'qwsww', 'wswsws'),
(12341, 'laptop', 'lenovo', 'hp x360', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `dev_details`
--

CREATE TABLE `dev_details` (
  `dev_no` int(11) NOT NULL,
  `dev_tyoe` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev_details`
--

INSERT INTO `dev_details` (`dev_no`, `dev_tyoe`) VALUES
(1, 'LAPTOP'),
(2, 'DESKTOP'),
(3, 'MONITOR'),
(4, 'CPU'),
(5, 'OTHER ACCESSORIES');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `cust_no` int(11) NOT NULL,
  `ser_amt` int(11) DEFAULT NULL,
  `pay_type` varchar(50) DEFAULT NULL,
  `ser_tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`cust_no`, `ser_amt`, `pay_type`, `ser_tax`) VALUES
(0, 0, '', 0),
(11121, 200, 'paytm', 220),
(12341, 400, 'paytm', 440);

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `ser_tax` BEFORE INSERT ON `payment` FOR EACH ROW set new.ser_tax=(new.ser_amt+(new.ser_amt*0.10))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `cust_no` int(11) NOT NULL,
  `prob_type` varchar(50) DEFAULT NULL,
  `prob_det` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`cust_no`, `prob_type`, `prob_det`) VALUES
(0, '', ''),
(11121, 'wswsws', 'wswssw'),
(12341, 'software', 'os is corrupt');

-- --------------------------------------------------------

--
-- Table structure for table `scustomer`
--

CREATE TABLE `scustomer` (
  `cust_no` int(11) NOT NULL,
  `cust_name` varchar(30) DEFAULT NULL,
  `cust_addr` varchar(40) DEFAULT NULL,
  `cust_phn` int(11) DEFAULT NULL,
  `cust_email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scustomer`
--

INSERT INTO `scustomer` (`cust_no`, `cust_name`, `cust_addr`, `cust_phn`, `cust_email`) VALUES
(0, '', '', 0, ''),
(1, 'harsha', '9108330206', 0, 's@gmail.com'),
(3, 'jihjhj', 'ddsd', 332, 'eee'),
(5, 'jihjhj', 'ddsd', 332, 'eee'),
(12, 'hhhh', '22323', 0, 'kkjhhj'),
(15, 'aqa', 'tumkur', 2121, 'sasvw'),
(17, 'ppppp', 'iji', 77777, 'oioi'),
(44, 'www', 'rrr', 444, 'rrr'),
(47, 'harsha', 'dsa', 159753, 'eadcf'),
(87, 'lop', 'iuui', 789, 'iu'),
(89, 'l', 'kok', 9999, 'kok'),
(98, 'DD', 'DDD', 444, 'DD'),
(159, 'klllk', 'kkkjj', 55454, 'kkkk'),
(187, '', '', 0, ''),
(197, 'abhi', 'tumkur', 78929, 'abhi@gmail.com'),
(231, 'eeee', 'jjj', 888, 'jjj'),
(765, 'gfgfgf', 'gggf', 878787, 'gfgf'),
(1234, 'anil', '9964', 0, 'anil@gmail.com'),
(1254, '', '', 0, ''),
(123412, 'sasa', 'easew', 3545, 'wsawe');

-- --------------------------------------------------------

--
-- Table structure for table `sdevice`
--

CREATE TABLE `sdevice` (
  `cust_no` int(11) DEFAULT NULL,
  `dev_no` int(11) DEFAULT NULL,
  `cmp_name` varchar(40) DEFAULT NULL,
  `model_no` varchar(40) DEFAULT NULL,
  `color` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdevice`
--

INSERT INTO `sdevice` (`cust_no`, `dev_no`, `cmp_name`, `model_no`, `color`) VALUES
(1, 1, 'hp', 'hp ls600', 'black'),
(1, 4, 'hp', 'hp ls300', 'black'),
(1, 5, 'dell', 'dell 700sd', 'black'),
(1234, 1, 'dcax', 'dsvrv', 'black'),
(1234, 1, 'dcax', 'dsvrv', 'black'),
(17, 2, 'hp', 'gjh', 'jhjh'),
(17, 2, 'hp', 'gjh', 'jhjh'),
(17, 3, 'hp', 'gjh', 'jhjh'),
(1, 2, 'hhhh', 'klklk', 'eeew'),
(15, 2, 'wq', 'assa', 'asas'),
(15, 2, 'wq', 'assa', 'asas'),
(15, 2, 'wq', 'assa', 'asas'),
(89, 2, 'p', 'p', 'i'),
(89, 2, 'p', 'p', 'i'),
(89, 2, 'p', 'p', 'i'),
(89, 2, '56', '265', '2215'),
(87, 2, 'k', 'l', 'o'),
(197, 1, 'hp', 'hp x360', 'black'),
(197, 2, 'hp', 'hp 1s420', 'black'),
(47, 2, 'efda', 'edc', 'edccf'),
(47, 4, 'fdsfr', 'rdsvr', 'rdfrse'),
(123412, 2, 'ascdw', 'asds', 'asd'),
(123412, 4, 'asd', 'sdq', 'qsad'),
(1254, 1, 'dcax', '365', 'red'),
(187, 2, '', '', ''),
(231, 2, 'jjj', 'jjj', 'jjj'),
(44, 2, 'ee', 'eee', 'ee'),
(765, 3, 'ggfgf', 'gfgfgf', 'gfgf'),
(765, 4, 'hgghhg', 'ghhggh', 'ggg');

-- --------------------------------------------------------

--
-- Table structure for table `spayment`
--

CREATE TABLE `spayment` (
  `cust_no` int(11) DEFAULT NULL,
  `dev_no` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `pay_type` varchar(50) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spayment`
--

INSERT INTO `spayment` (`cust_no`, `dev_no`, `amount`, `pay_type`, `total`) VALUES
(1, 1, 50000, 'cash', 47500),
(1, 4, 30000, 'cash', 28500),
(1, 5, 400, 'cash', 380),
(1234, 1, 345, 'cash', 328),
(1, 2, 30000, 'paytm', 28500),
(17, 2, 30000, 'paytm', 28500),
(17, 2, 30000, 'paytm', 28500),
(87, 2, 90000, 'cash', 85500),
(197, 1, 30000, 'paytm', 28500),
(197, 2, 40000, 'cash', 38000),
(47, 2, 30000, 'cash', 28500),
(47, 4, 30000, 'cash', 28500),
(123412, 2, 33232, 'cash', 31570),
(123412, 4, 5555, 'card', 5277),
(1254, 1, 2323, 'card', 2207),
(231, 2, 666, '', 633),
(231, 2, 666, '', 633),
(231, 2, 666, 'cash', 633),
(44, 2, 4444, 'cash', 4222),
(44, 2, 400, 'cash', 380),
(765, 2, 55555, 'cash', 52777);

--
-- Triggers `spayment`
--
DELIMITER $$
CREATE TRIGGER `total` BEFORE INSERT ON `spayment` FOR EACH ROW set new.total=(new.amount-(new.amount*0.05))
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `date_details`
--
ALTER TABLE `date_details`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `dev_details`
--
ALTER TABLE `dev_details`
  ADD PRIMARY KEY (`dev_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `scustomer`
--
ALTER TABLE `scustomer`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `sdevice`
--
ALTER TABLE `sdevice`
  ADD KEY `cust_no` (`cust_no`),
  ADD KEY `dev_no` (`dev_no`);

--
-- Indexes for table `spayment`
--
ALTER TABLE `spayment`
  ADD KEY `cust_no` (`cust_no`),
  ADD KEY `dev_no` (`dev_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `date_details`
--
ALTER TABLE `date_details`
  ADD CONSTRAINT `date_details_ibfk_1` FOREIGN KEY (`cust_no`) REFERENCES `customer` (`cust_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`cust_no`) REFERENCES `customer` (`cust_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`cust_no`) REFERENCES `customer` (`cust_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`cust_no`) REFERENCES `customer` (`cust_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sdevice`
--
ALTER TABLE `sdevice`
  ADD CONSTRAINT `sdevice_ibfk_1` FOREIGN KEY (`cust_no`) REFERENCES `scustomer` (`cust_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sdevice_ibfk_2` FOREIGN KEY (`dev_no`) REFERENCES `dev_details` (`dev_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spayment`
--
ALTER TABLE `spayment`
  ADD CONSTRAINT `spayment_ibfk_1` FOREIGN KEY (`cust_no`) REFERENCES `scustomer` (`cust_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spayment_ibfk_2` FOREIGN KEY (`dev_no`) REFERENCES `dev_details` (`dev_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
