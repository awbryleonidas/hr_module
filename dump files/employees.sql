/*
Navicat MySQL Data Transfer

Source Server         : zLOCALHOST
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : hr

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2017-02-16 15:26:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) NOT NULL,
  `employee_firstname` varchar(255) NOT NULL,
  `employee_lastname` varchar(255) NOT NULL,
  `employee_username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`employee_id`,`employee_firstname`,`employee_lastname`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1', '2017-001', 'Test', 'Employee', 'testemployee');
INSERT INTO `employees` VALUES ('2', '2017-002', 'Test', 'Employee', 'testemployee2');
INSERT INTO `employees` VALUES ('3', '2017-003', 'Test', 'Employee', 'testemployee3');
INSERT INTO `employees` VALUES ('4', '2017-004', 'Test', 'Employee', 'testemployee4');
INSERT INTO `employees` VALUES ('5', '2017-005', 'Test', 'Employee', 'testemployee5');
INSERT INTO `employees` VALUES ('6', '2017-006', 'Test', 'Employee', 'testemployee6');
