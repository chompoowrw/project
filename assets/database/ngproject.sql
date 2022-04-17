/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ngproject

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-02-27 22:33:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_bill`
-- ----------------------------
DROP TABLE IF EXISTS `tb_bill`;
CREATE TABLE `tb_bill` (
  `bill_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `reservation_id` int(10) DEFAULT NULL,
  `payment_id` int(10) DEFAULT NULL,
  `bill_name` text DEFAULT NULL,
  `bill_phone` varchar(10) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `payment_id` (`payment_id`),
  KEY `reservation_id` (`reservation_id`),
  CONSTRAINT `tb_bill_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `tb_payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_bill_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `tb_reservation` (`reservation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_bill
-- ----------------------------
INSERT INTO `tb_bill` VALUES ('1', '2', '2', '1', 'ทดสอบ ระบบ', '1234', '2022-02-27');
INSERT INTO `tb_bill` VALUES ('2', '2', '2', '1', 'ทดสอบ ระบบ', '1234', '2022-02-27');
INSERT INTO `tb_bill` VALUES ('3', '2', '2', '1', 'ทดสอบ ระบบ', '1234', '2022-02-27');
INSERT INTO `tb_bill` VALUES ('4', '2', '2', '1', 'ทดสอบ ระบบ', '1234', '2022-02-27');
INSERT INTO `tb_bill` VALUES ('5', '2', '2', '1', 'ทดสอบ ระบบ', '1234', '2022-02-27');

-- ----------------------------
-- Table structure for `tb_payment`
-- ----------------------------
DROP TABLE IF EXISTS `tb_payment`;
CREATE TABLE `tb_payment` (
  `payment_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `reservation_id` int(10) DEFAULT NULL,
  `slip` text DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `reservation_id` (`reservation_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_payment_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `tb_reservation` (`reservation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_payment
-- ----------------------------
INSERT INTO `tb_payment` VALUES ('1', '1', '2', '894b31ddab989f29440bcfc5429dddb9', '2022-02-26');
INSERT INTO `tb_payment` VALUES ('2', '2', '4', '295ffd0951e556c2922c070c22f6f017', '2022-02-26');

-- ----------------------------
-- Table structure for `tb_proposal_price`
-- ----------------------------
DROP TABLE IF EXISTS `tb_proposal_price`;
CREATE TABLE `tb_proposal_price` (
  `proposal_price_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `proposal_price_phone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`proposal_price_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_proposal_price_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_proposal_price
-- ----------------------------
INSERT INTO `tb_proposal_price` VALUES ('1', '2', '12355', '36658');
INSERT INTO `tb_proposal_price` VALUES ('2', '2', '5', '1234');
INSERT INTO `tb_proposal_price` VALUES ('3', '2', '5', '1234');
INSERT INTO `tb_proposal_price` VALUES ('4', '2', '5', '12345');

-- ----------------------------
-- Table structure for `tb_questionnaire`
-- ----------------------------
DROP TABLE IF EXISTS `tb_questionnaire`;
CREATE TABLE `tb_questionnaire` (
  `questionnaire_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `questionnaire_date` date DEFAULT NULL,
  `question` text DEFAULT NULL,
  PRIMARY KEY (`questionnaire_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_questionnaire_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_questionnaire
-- ----------------------------
INSERT INTO `tb_questionnaire` VALUES ('1', '1', '2022-02-27', '2');

-- ----------------------------
-- Table structure for `tb_reservation`
-- ----------------------------
DROP TABLE IF EXISTS `tb_reservation`;
CREATE TABLE `tb_reservation` (
  `reservation_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `reservation_name` text DEFAULT NULL,
  `reservation_phone` varchar(10) DEFAULT NULL,
  `deposit` int(10) DEFAULT NULL,
  `status_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `tb_reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tb_reservation_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_reservation
-- ----------------------------
INSERT INTO `tb_reservation` VALUES ('2', '2', 'ค่ามัดจำ', '1234', '700', '3');
INSERT INTO `tb_reservation` VALUES ('4', '2', 'ทดสอบ ระบบ', '1234', '70', '2');

-- ----------------------------
-- Table structure for `tb_role`
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES ('1', 'ผู้ดูแลระบบ');
INSERT INTO `tb_role` VALUES ('2', 'ผู้ใช้งาน');

-- ----------------------------
-- Table structure for `tb_status`
-- ----------------------------
DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `status_id` int(2) NOT NULL AUTO_INCREMENT,
  `status_name` text DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_status
-- ----------------------------
INSERT INTO `tb_status` VALUES ('1', 'ยังไม่ได้ชำระเงิน');
INSERT INTO `tb_status` VALUES ('2', 'ส่งสลิปแล้ว');
INSERT INTO `tb_status` VALUES ('3', 'ชำระเงินแล้ว');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` text DEFAULT NULL,
  `user_tel` varchar(10) DEFAULT '',
  `user_email` varchar(30) DEFAULT NULL,
  `user_lineid` varchar(30) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT '',
  `role_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'ทดสอบ ระบบ', '1234', 'admin@gmail.com', 'admin', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', '1');
INSERT INTO `tb_user` VALUES ('2', 'ทดสอบ ระบบ', '1234', 'test@gmail.com', 'test', 'test', 'e807f1fcf82d132f9bb018ca6738a19f', '2');
