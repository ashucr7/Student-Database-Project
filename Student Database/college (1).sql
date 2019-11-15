-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 04:58 PM
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
-- Database: `college`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `lib` ()  NO SQL
select * FROM library$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` varchar(10) NOT NULL,
  `ad_passwd` varchar(15) NOT NULL,
  `ad_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_passwd`, `ad_name`) VALUES
('1ay16cs024', 'ayesha', 'rifath');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dname` varchar(10) NOT NULL,
  `no_staff` int(10) NOT NULL,
  `no_stud` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dname`, `no_staff`, `no_stud`) VALUES
('cse', 45, 2500),
('ece', 40, 1000),
('eee', 15, 700),
('ise', 40, 1500),
('me', 14, 875),
('tc', 25, 800);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `eid` varchar(10) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `dname` varchar(10) NOT NULL,
  `ephn` bigint(15) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `eaddress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`eid`, `ename`, `dname`, `ephn`, `gender`, `eaddress`) VALUES
('1ay045', 'santhosh', 'cse', 7854300952, 'm', 'mangalore'),
('1ay046', 'navya', 'ise', 8865871107, 'f', 'bangalore'),
('1ay047', 'ramya', 'ece', 7765432907, 'f', 'tumkur'),
('1ay048', 'ram', 'cse', 7765871107, 'm', 'bellary'),
('1ay049', 'suman', 'cse', 8863214079, 'f', 'bangalore'),
('1ay050', 'tanya', 'ise', 8863210997, 'f', 'bangalore'),
('1ay051', 'kavya', 'tc', 6767543290, 'f', 'bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `bill_no` int(10) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `date_of_payment` date NOT NULL,
  `total` int(10) NOT NULL,
  `paid` int(10) NOT NULL,
  `bal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`bill_no`, `usn`, `date_of_payment`, `total`, `paid`, `bal`) VALUES
(501, '1ay16cs023', '2018-11-17', 79000, 79000, 0),
(502, '1ay16is020', '2018-11-16', 10000, 10000, 0),
(503, '1ay15ec017', '2018-11-16', 24000, 10000, 14000),
(504, '1ay16cs090', '2018-11-05', 39000, 30000, 9000),
(505, '1ay17cs045', '2018-12-11', 24000, 24000, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `girl_student`
-- (See below for the actual view)
--
CREATE TABLE `girl_student` (
`sname` varchar(20)
,`sgender` varchar(5)
,`usn` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `b_no` int(5) NOT NULL,
  `bname` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `usn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`b_no`, `bname`, `address`, `usn`) VALUES
(1, 'anugraha', 'jaynagar,4th cross', '1ay16cs023'),
(2, 'crystal hostel', 'jaynagar', '1ay16cs090'),
(3, 'galaxy hostel', 'chickbanavara', '1ay17ise01'),
(8, 'ashirwad', 'gavipuram', '1ay15ec017');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `book_id` int(10) NOT NULL,
  `dname` varchar(10) NOT NULL,
  `book_title` varchar(20) NOT NULL,
  `book_price` int(10) NOT NULL,
  `book_author` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`book_id`, `dname`, `book_title`, `book_price`, `book_author`) VALUES
(17320, 'cse', 'maths', 450, 'padma reddy'),
(17321, 'ise', 'maths', 400, 'padma reddy'),
(17322, 'cse', 'dbms', 600, 'navathe'),
(17323, 'ise', 'discrete mathematics', 500, 'kenneth'),
(17325, 'ece', 'Art of electronics', 550, 'paul horowitz');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `sname` varchar(20) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `sem` int(5) NOT NULL,
  `dname` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `sgender` varchar(5) NOT NULL,
  `sphn` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`sname`, `usn`, `sem`, `dname`, `dob`, `sgender`, `sphn`) VALUES
('vikas', '1ay15cs023', 7, 'cse', '1996-08-16', 'm', 9981234568),
('karan', '1ay15ec017', 7, 'ece', '1998-11-09', 'm', 9987654323),
('ayesha', '1ay16cs023', 5, 'cse', '1998-10-08', 'f', 8296515878),
('anu', '1ay16cs090', 5, 'cse', '1998-08-06', 'f', 9981500500),
('wsd', '1ay16cs098', 5, 'cse', '1555-12-10', 'm', 496999768),
('ayesha', '1ay16cs111', 5, 'cse', '2019-11-07', 'f', 34566),
('anusha', '1ay16ee002', 5, 'eee', '2018-12-10', 'f', 7854190865),
('apurva', '1ay16is020', 5, 'ise', '1999-11-13', 'f', 8876090911),
('fathima', '1ay17cs045', 3, 'cse', '2000-12-05', 'f', 8769054322),
('ashish', '1ay17ise01', 3, 'ise', '2000-11-02', 'f', 9987321023);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `eid` varchar(10) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `basic_sal` int(11) NOT NULL,
  `hra` int(11) NOT NULL,
  `da` int(11) NOT NULL,
  `gross_sal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`eid`, `ename`, `basic_sal`, `hra`, `da`, `gross_sal`) VALUES
('1ay045', 'santhosha', 89000, 800, 200, 90000),
('1ay047', 'ramya', 30000, 300, 200, 30500),
('1ay050', 'tanya', 45000, 600, 300, 45900),
('1ay051', 'kavya', 49000, 600, 300, 49900);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sname` varchar(20) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `sem` int(5) NOT NULL,
  `dname` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `sgender` varchar(5) NOT NULL,
  `sphn` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sname`, `usn`, `sem`, `dname`, `dob`, `sgender`, `sphn`) VALUES
('karan', '1ay15ec017', 7, 'ece', '1998-11-09', 'm', 9987654323),
('aysh', '1ay16cs023', 5, 'cse', '2018-12-12', 'f', 98765432),
('anu', '1ay16cs090', 5, 'cse', '1998-08-16', 'f', 9981500500),
('wsd', '1ay16cs098', 5, 'cse', '1555-12-10', 'm', 496999768),
('apurva', '1ay16is020', 5, 'ise', '1999-11-13', 'f', 8876090911),
('fathima', '1ay17cs045', 3, 'cse', '2000-12-05', 'f', 8769054322),
('ashish', '1ay17ise01', 3, 'ise', '2000-11-02', 'm', 9987321023);

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `insert_logs` AFTER INSERT ON `student` FOR EACH ROW BEGIN
INSERT INTO log VALUES(new.sname,new.usn,new.sem,new.dname,new.dob,new.sgender,new.sphn);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `girl_student`
--
DROP TABLE IF EXISTS `girl_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `girl_student`  AS  select `s`.`sname` AS `sname`,`s`.`sgender` AS `sgender`,`s`.`usn` AS `usn` from `student` `s` where (`s`.`sgender` = 'f') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `ad_name` (`ad_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dname`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `faculty_ibfk_1` (`dname`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `fee_ibfk_1` (`usn`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`b_no`),
  ADD KEY `hostel_ibfk_1` (`usn`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `library_ibfk_1` (`dname`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD KEY `salary_ibfk_1` (`eid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`),
  ADD KEY `student_ibfk_1` (`dname`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`dname`) REFERENCES `department` (`dname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel`
--
ALTER TABLE `hostel`
  ADD CONSTRAINT `hostel_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`dname`) REFERENCES `department` (`dname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `faculty` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dname`) REFERENCES `department` (`dname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
