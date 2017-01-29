/*
 Navicat Premium Data Transfer

 Source Server         : SERVER
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost
 Source Database       : segey

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : utf-8

 Date: 01/29/2017 17:28:21 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `siceey`
-- ----------------------------
DROP TABLE IF EXISTS `siceey`;
CREATE TABLE `siceey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) DEFAULT NULL,
  `ap_paterno` varchar(60) DEFAULT NULL,
  `ap_materno` varchar(60) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `clavecct` varchar(10) DEFAULT NULL,
  `municipio` varchar(3) DEFAULT '000',
  `localidad` varchar(4) DEFAULT '0000',
  `codpos` varchar(5) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `curp` (`curp`),
  KEY `clavecct` (`clavecct`)
) ENGINE=InnoDB AUTO_INCREMENT=435098 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
