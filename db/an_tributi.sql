-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Giu 22, 2017 alle 09:55
-- Versione del server: 5.5.27
-- Versione PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gestione_finanziaria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `an_tributi`
--

CREATE TABLE IF NOT EXISTS `an_tributi` (
  `id_tributo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tributo` int(11) NOT NULL DEFAULT '0',
  `descrizione_tributo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_tributo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dump dei dati per la tabella `an_tributi`
--

INSERT INTO `an_tributi` (`id_tributo`, `cod_tributo`, `descrizione_tributo`) VALUES
(1, 4001, 'saldo IRPEF'),
(2, 4033, 'IRPEF acconto - prima rata'),
(3, 4034, 'IRPEF acconto - seconda rata'),
(4, 3800, 'IRAP - saldo'),
(5, 3801, 'addizionare regionale IRPEF'),
(6, 3812, 'IRAP acconto prima rata'),
(7, 3817, 'addizionale comunale IRPEF'),
(8, 6035, 'Versamento IVA acconto'),
(9, 6031, 'Versamento IVA trimestrale 1 trimestre'),
(10, 8100, 'INPS'),
(11, 6032, 'Versamento IVA trimestrale 2 trimestre'),
(12, 6099, 'Versamento IVA sulla base della dichiarazione annuale'),
(13, 6033, 'Versamento IVA trimestrale 3 trimestre'),
(14, 3813, 'IRAP acconto seconda rata'),
(15, 3861, 'Addizionale comunale all''IRPEF - Acconto'),
(16, 3843, 'Addizionale comunale IRPEF - Acconto'),
(17, 3844, 'Addizionale comunale IRPEF - Saldo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
