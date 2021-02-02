/*
Navicat MySQL Data Transfer

Source Server         : conex
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : examens12

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-02-02 15:16:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cita
-- ----------------------------
DROP TABLE IF EXISTS `cita`;
CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `fecha_cita` varchar(255) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `fk1_idx` (`id_doctor`),
  KEY `fk2_idx` (`id_paciente`),
  CONSTRAINT `fk1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cita
-- ----------------------------
INSERT INTO `cita` VALUES ('3', '1', '2020-12-25', '9');
INSERT INTO `cita` VALUES ('9', '9', '2021-01-13', '2');
INSERT INTO `cita` VALUES ('10', '8', '2021-01-18', '9');
INSERT INTO `cita` VALUES ('18', '8', '2021-01-26', '2');
INSERT INTO `cita` VALUES ('19', '9', '2021-01-27', '9');
INSERT INTO `cita` VALUES ('20', '1', '2021-01-21', '9');
INSERT INTO `cita` VALUES ('21', '9', '2021-02-02', '2');
INSERT INTO `cita` VALUES ('22', '1', '2021-02-02', '1');

-- ----------------------------
-- Table structure for cita_detalle
-- ----------------------------
DROP TABLE IF EXISTS `cita_detalle`;
CREATE TABLE `cita_detalle` (
  `id_cita_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) NOT NULL,
  `id_consulta` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_cita_detalle`),
  KEY `fk3_idx` (`id_cita`),
  KEY `fk03` (`id_consulta`),
  CONSTRAINT `fk03` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id_consulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk3` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cita_detalle
-- ----------------------------
INSERT INTO `cita_detalle` VALUES ('9', '3', '10', '80', '100');
INSERT INTO `cita_detalle` VALUES ('27', '3', '1', '50', '90');
INSERT INTO `cita_detalle` VALUES ('28', '3', '5', '60', '80');
INSERT INTO `cita_detalle` VALUES ('29', '9', '10', '80', '100');
INSERT INTO `cita_detalle` VALUES ('30', '9', '4', '30', '80');
INSERT INTO `cita_detalle` VALUES ('31', '10', '5', '60', '80');
INSERT INTO `cita_detalle` VALUES ('32', '21', '5', '60', '80');
INSERT INTO `cita_detalle` VALUES ('33', '22', '13', '50', '80');

-- ----------------------------
-- Table structure for consulta
-- ----------------------------
DROP TABLE IF EXISTS `consulta`;
CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_consulta`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consulta
-- ----------------------------
INSERT INTO `consulta` VALUES ('1', 'ecográfica', '50');
INSERT INTO `consulta` VALUES ('2', 'laboratorio', '40');
INSERT INTO `consulta` VALUES ('4', 'ginecología', '30');
INSERT INTO `consulta` VALUES ('5', 'topico', '60');
INSERT INTO `consulta` VALUES ('10', 'ecográfica', '80');
INSERT INTO `consulta` VALUES ('12', 'odontología', '70');
INSERT INTO `consulta` VALUES ('13', 'medicina general', '50');

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL AUTO_INCREMENT,
  `ape_nom` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES ('1', 'juan quispe chocce', '78945612', 'cirujano');
INSERT INTO `doctor` VALUES ('2', 'lucho quispe lujan', '77788855', '987456321');
INSERT INTO `doctor` VALUES ('9', 'CLIN ROGER', '78774463', 'cirujano');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');

-- ----------------------------
-- Table structure for paciente
-- ----------------------------
DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `ape_nom` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paciente
-- ----------------------------
INSERT INTO `paciente` VALUES ('1', 'isai ismael sandoval ccaccro', '74433542', '999888777');
INSERT INTO `paciente` VALUES ('8', 'julio quispe gavilans', '78945612', '999888777');
INSERT INTO `paciente` VALUES ('9', 'mari perez  panao suarez', '77777777', '999888777');
INSERT INTO `paciente` VALUES ('10', 'merly rojas rojas', '88855522', '999888777');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ape_nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'isai', 'isai ismael sandoval ccaccro', 'isai', 'isai.ismael1999@gmail.com', null, 'dd4b21e9ef71e1291183a46b913ae6f2', null, '2020-12-08 00:14:23', '2020-12-08 00:14:23');
INSERT INTO `usuario` VALUES ('6', 'juan', 'juan', null, null, null, 'dd4b21e9ef71e1291183a46b913ae6f2', null, null, null);

-- ----------------------------
-- Table structure for usuarios2
-- ----------------------------
DROP TABLE IF EXISTS `usuarios2`;
CREATE TABLE `usuarios2` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `ape_nom` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios2
-- ----------------------------
