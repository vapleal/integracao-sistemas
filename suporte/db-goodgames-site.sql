-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.10-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para goodgames
CREATE DATABASE IF NOT EXISTS `goodgames` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `goodgames`;

-- Copiando estrutura para tabela goodgames.tb_console
CREATE TABLE IF NOT EXISTS `tb_console` (
  `idcons` int(4) NOT NULL AUTO_INCREMENT,
  `desccons` varchar(30) NOT NULL,
  `tpmidiacons` varchar(30) NOT NULL,
  `fabricantecons` varchar(30) NOT NULL,
  PRIMARY KEY (`idcons`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela goodgames.tb_console: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_console` DISABLE KEYS */;
INSERT INTO `tb_console` (`idcons`, `desccons`, `tpmidiacons`, `fabricantecons`) VALUES
	(1, 'Play Station', 'CD Rom', 'Sony'),
	(2, 'Play Station 2', 'DVD Rom', 'Sony'),
	(3, 'Play Station 3', 'Blu Ray', 'Sony'),
	(4, 'Nintendo 64', 'Cartucho', 'Nintendo'),
	(5, 'Wii', 'DVD Rom', 'Nintendo'),
	(6, 'X-Box 360', 'DVD Rom', 'Microsoft'),
	(7, 'X-Box One', 'Blu Ray', 'Microsoft');
/*!40000 ALTER TABLE `tb_console` ENABLE KEYS */;

-- Copiando estrutura para tabela goodgames.tb_jogo
CREATE TABLE IF NOT EXISTS `tb_jogo` (
  `idjogo` int(5) NOT NULL AUTO_INCREMENT,
  `titulojogo` varchar(30) NOT NULL,
  `resumojogo` text,
  `valorjogo` decimal(5,2) NOT NULL,
  `fk_softhouse` int(4) NOT NULL,
  `fk_console` int(4) NOT NULL,
  PRIMARY KEY (`idjogo`),
  KEY `fk_softhouse` (`fk_softhouse`),
  KEY `fk_console` (`fk_console`),
  CONSTRAINT `tb_jogo_ibfk_1` FOREIGN KEY (`fk_softhouse`) REFERENCES `tb_softhouse` (`idsh`),
  CONSTRAINT `tb_jogo_ibfk_2` FOREIGN KEY (`fk_console`) REFERENCES `tb_console` (`idcons`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela goodgames.tb_jogo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_jogo` DISABLE KEYS */;
INSERT INTO `tb_jogo` (`idjogo`, `titulojogo`, `resumojogo`, `valorjogo`, `fk_softhouse`, `fk_console`) VALUES
	(1, 'GTA', 'Mate tudo que se move', 45.28, 5, 3),
	(2, 'GTA', 'Mate tudo que se move', 35.28, 5, 6),
	(3, 'Monkey Island', 'Encontre o tesouro', 22.50, 6, 6),
	(4, 'Donkey Kong', 'Pule igual macaco', 99.25, 10, 4);
/*!40000 ALTER TABLE `tb_jogo` ENABLE KEYS */;

-- Copiando estrutura para tabela goodgames.tb_softhouse
CREATE TABLE IF NOT EXISTS `tb_softhouse` (
  `idsh` int(4) NOT NULL AUTO_INCREMENT,
  `descsh` varchar(30) NOT NULL,
  PRIMARY KEY (`idsh`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela goodgames.tb_softhouse: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_softhouse` DISABLE KEYS */;
INSERT INTO `tb_softhouse` (`idsh`, `descsh`) VALUES
	(1, 'Sony'),
	(2, 'Nintendo'),
	(3, 'Microsoft'),
	(4, 'EA Games'),
	(5, 'RockStar'),
	(6, 'Lucas Arts'),
	(7, 'Square Enix'),
	(8, 'SEGA'),
	(9, 'Ubisoft'),
	(10, 'Rare'),
	(11, 'teste integra');
/*!40000 ALTER TABLE `tb_softhouse` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
