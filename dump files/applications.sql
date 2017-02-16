/*
Navicat MySQL Data Transfer

Source Server         : zLOCALHOST
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : hr

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2017-02-16 15:26:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for applications
-- ----------------------------
DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `application_employee_id` varchar(50) NOT NULL,
  `application_date` datetime NOT NULL,
  `application_created` datetime NOT NULL,
  `application_status` set('denied','pending','approved') DEFAULT NULL,
  `application_type` set('undertime','overtime','sick leave','vacation leave') DEFAULT NULL,
  `application_reason` text,
  PRIMARY KEY (`application_id`,`application_employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of applications
-- ----------------------------
INSERT INTO `applications` VALUES ('1', '2017-001', '2017-02-16 12:41:53', '2017-02-16 12:41:59', 'denied', 'sick leave', 'not feeling well');
