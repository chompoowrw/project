-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 12:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngnproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill`
--

CREATE TABLE `tb_bill` (
  `bill_id` int(10) NOT NULL,
  `reservation_id` int(10) DEFAULT NULL,
  `payment_id` int(10) DEFAULT NULL,
  `bill_name` text DEFAULT NULL,
  `bill_phone` varchar(10) DEFAULT NULL,
  `bill_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `payment_id` int(10) NOT NULL,
  `reservation_id` int(10) DEFAULT NULL,
  `slip` text DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_proposal_price`
--

CREATE TABLE `tb_proposal_price` (
  `proposal_price_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `proposal_price_phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_questionnaire`
--

CREATE TABLE `tb_questionnaire` (
  `questionnaire_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `questionnaire_date` date DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservation`
--

CREATE TABLE `tb_reservation` (
  `reservation_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `reservation_name` text DEFAULT NULL,
  `reservation_phone` varchar(10) DEFAULT NULL,
  `deposit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_name`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'ผู้ใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status_id` int(2) NOT NULL,
  `status_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL,
  `user_name` text DEFAULT NULL,
  `user_tel` int(10) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_lineid` varchar(30) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(30) DEFAULT NULL,
  `role_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_tel`, `user_email`, `user_lineid`, `user_username`, `user_password`, `role_id`) VALUES
(1, 'ทรงพล', 1234, 'beer@gmail.com', 'beer', 'beer', '1234567890', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `tb_proposal_price`
--
ALTER TABLE `tb_proposal_price`
  ADD PRIMARY KEY (`proposal_price_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_questionnaire`
--
ALTER TABLE `tb_questionnaire`
  ADD PRIMARY KEY (`questionnaire_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_reservation`
--
ALTER TABLE `tb_reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bill`
--
ALTER TABLE `tb_bill`
  MODIFY `bill_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_questionnaire`
--
ALTER TABLE `tb_questionnaire`
  MODIFY `questionnaire_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_reservation`
--
ALTER TABLE `tb_reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `status_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD CONSTRAINT `tb_bill_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `tb_payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_bill_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `tb_reservation` (`reservation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD CONSTRAINT `tb_payment_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `tb_reservation` (`reservation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_proposal_price`
--
ALTER TABLE `tb_proposal_price`
  ADD CONSTRAINT `tb_proposal_price_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_questionnaire`
--
ALTER TABLE `tb_questionnaire`
  ADD CONSTRAINT `tb_questionnaire_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_reservation`
--
ALTER TABLE `tb_reservation`
  ADD CONSTRAINT `tb_reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
