/*
Navicat MySQL Data Transfer

Source Server         : zLOCALHOST
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : hr

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2017-02-16 15:26:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for time_entries
-- ----------------------------
DROP TABLE IF EXISTS `time_entries`;
CREATE TABLE `time_entries` (
  `time_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_entry_in` datetime NOT NULL,
  `time_entry_out` datetime NOT NULL,
  `time_entry_employee_id` varchar(50) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`time_entry_id`,`time_entry_in`,`time_entry_out`,`time_entry_employee_id`,`time_date`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of time_entries
-- ----------------------------
INSERT INTO `time_entries` VALUES ('1', '2017-02-16 11:30:47', '2017-02-16 23:30:58', '2017-001', '2017-02-16 13:48:35');
