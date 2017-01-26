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

 Date: 01/25/2017 23:58:52 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `s_beneficiados`
-- ----------------------------
DROP TABLE IF EXISTS `s_beneficiados`;
CREATE TABLE `s_beneficiados` (
  `idSol` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `idCiclo` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `curp` char(18) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `clavecct` char(10) DEFAULT NULL,
  `nombrect` varchar(200) DEFAULT NULL,
  `turno` tinyint(1) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `fechaModificacion` timestamp NULL DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL COMMENT '1 = >Activo 0=> Inactivo',
  PRIMARY KEY (`idSol`),
  UNIQUE KEY `key` (`idTipo`,`nombre`,`idCiclo`) USING BTREE,
  KEY `idUsuario` (`idUsuario`),
  KEY `idTipo` (`idTipo`),
  KEY `turno` (`turno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `s_cat_ciclos`
-- ----------------------------
DROP TABLE IF EXISTS `s_cat_ciclos`;
CREATE TABLE `s_cat_ciclos` (
  `idciclo` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(15) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idciclo`),
  UNIQUE KEY `idciclo` (`idciclo`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_cat_ciclos`
-- ----------------------------
BEGIN;
INSERT INTO `s_cat_ciclos` VALUES ('1', '2016-2017', '2016-08-29', '2017-07-21', '1');
COMMIT;

-- ----------------------------
--  Table structure for `s_cat_tipos`
-- ----------------------------
DROP TABLE IF EXISTS `s_cat_tipos`;
CREATE TABLE `s_cat_tipos` (
  `idTipo` tinyint(1) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(60) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT '1' COMMENT '1 => Activo 0 => Inactivo',
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_cat_tipos`
-- ----------------------------
BEGIN;
INSERT INTO `s_cat_tipos` VALUES ('1', 'Alumnos', '1'), ('2', 'Docentes', '1'), ('3', 'Escuelas', '1'), ('4', 'Padres de familia', '1');
COMMIT;

-- ----------------------------
--  Table structure for `s_cat_turnos`
-- ----------------------------
DROP TABLE IF EXISTS `s_cat_turnos`;
CREATE TABLE `s_cat_turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `turno` varchar(30) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_cat_turnos`
-- ----------------------------
BEGIN;
INSERT INTO `s_cat_turnos` VALUES ('1', 'MATUTINO', '1'), ('2', 'VESPERTINO', '1'), ('3', 'NOCTURNO', '1'), ('4', 'DISCONTINUO', '1');
COMMIT;

-- ----------------------------
--  Table structure for `s_ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `s_ci_sessions`;
CREATE TABLE `s_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_ci_sessions`
-- ----------------------------
BEGIN;
INSERT INTO `s_ci_sessions` VALUES ('39cfdcd54d2951452f03685c678e094c', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '1485409600', 'a:8:{s:9:\"user_data\";s:0:\"\";s:13:\"sep_idUsuario\";s:1:\"1\";s:19:\"sep_idPerfilUsuario\";s:1:\"2\";s:10:\"sep_idTipo\";s:1:\"3\";s:8:\"sep_tipo\";s:8:\"Escuelas\";s:12:\"sep_programa\";s:14:\"TIEMPOCOMPLETO\";s:16:\"sep_UltimoAcceso\";s:19:\"2017-01-25 01:00:01\";s:13:\"sep_logged_in\";b:1;}');
COMMIT;

-- ----------------------------
--  Table structure for `s_perfiles`
-- ----------------------------
DROP TABLE IF EXISTS `s_perfiles`;
CREATE TABLE `s_perfiles` (
  `idPerfilUsuario` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombrePerfilUsuario` varchar(45) NOT NULL,
  `descripcionPerfilUsuario` varchar(255) DEFAULT NULL,
  `fechaModPerfilUsuario` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estatusPerfilUsuario` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPerfilUsuario`),
  KEY `idPerfilUsuario` (`idPerfilUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_perfiles`
-- ----------------------------
BEGIN;
INSERT INTO `s_perfiles` VALUES ('1', 'Administrador sistema', 'Administrador del sistema', '2016-05-20 11:08:25', '1'), ('2', 'Programa', 'Usuario del sistema', '2016-05-20 11:08:25', '1');
COMMIT;

-- ----------------------------
--  Table structure for `s_usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `s_usuarios`;
CREATE TABLE `s_usuarios` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idPerfilUsuario` tinyint(2) unsigned NOT NULL,
  `idTipo` tinyint(1) NOT NULL,
  `programa` varchar(30) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaAcceso` datetime DEFAULT NULL,
  `fechaModificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `estatusUsuario` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 => Activo 0 => Inactivo\r\n0=> Inactivo',
  PRIMARY KEY (`idUsuario`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idPerfilUsuario` (`idPerfilUsuario`),
  KEY `idNivel` (`programa`),
  KEY `contrasena` (`contrasena`),
  KEY `estatusUsuario` (`estatusUsuario`),
  KEY `id_tipo` (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_usuarios`
-- ----------------------------
BEGIN;
INSERT INTO `s_usuarios` VALUES ('1', '2', '3', 'TIEMPOCOMPLETO', 'e10adc3949ba59abbe56e057f20f883e', 'PROGRAMA DE TIEMPO COMPLETO EN LAS ESCUELAS', '2017-01-22 00:03:00', '2017-01-25 18:15:00', '2017-01-25 21:15:40', '1'), ('2', '2', '1', 'BIENESTARESCOLAR', 'e10adc3949ba59abbe56e057f20f883e ', 'ENTREGA DE UTILES', '2016-05-21 00:00:00', '2016-09-29 15:54:04', '2017-01-24 23:10:17', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
