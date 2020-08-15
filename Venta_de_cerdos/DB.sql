-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for parcial_1
CREATE DATABASE IF NOT EXISTS `parcial_1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `parcial_1`;

-- Dumping structure for table parcial_1.inventario
CREATE TABLE IF NOT EXISTS `inventario` (
  `cantidad` int(11) NOT NULL,
  `ultima_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Inventario total de lechones';

-- Data exporting was unselected.

-- Dumping structure for table parcial_1.lechon
CREATE TABLE IF NOT EXISTS `lechon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio_compra` decimal(10,0) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `edad` tinyint(4) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Registro del animal';

-- Data exporting was unselected.

-- Dumping structure for table parcial_1.registro_peso
CREATE TABLE IF NOT EXISTS `registro_peso` (
  `id` int(11) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Registro de peso mensual';

-- Data exporting was unselected.

-- Dumping structure for table parcial_1.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Roles de autenticación';

-- Data exporting was unselected.

-- Dumping structure for table parcial_1.sesion
CREATE TABLE IF NOT EXISTS `sesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table parcial_1.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `FK__roles` (`rol`),
  CONSTRAINT `FK__roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Usuarios del sistema ';

-- Data exporting was unselected.

-- Dumping structure for table parcial_1.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cerdo` varchar(50) NOT NULL DEFAULT '0',
  `precio` decimal(10,0) NOT NULL DEFAULT '0',
  `precio_venta` decimal(10,0) NOT NULL DEFAULT '0',
  `age` smallint(6) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `cerdo` (`cerdo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
