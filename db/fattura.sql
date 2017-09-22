-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 22, 2017 alle 21:39
-- Versione del server: 5.7.14
-- Versione PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestfin`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `fattura`
--

CREATE TABLE `fattura` (
  `fattura_id` int(11) NOT NULL,
  `fattura_num_fattura` int(11) NOT NULL,
  `descrizione` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fattura_data_fattura` date NOT NULL,
  `fattura_data_pagamento` date DEFAULT NULL,
  `fattura_imponibile` float(10,2) NOT NULL DEFAULT '0.00',
  `percentuale_IVA` int(11) NOT NULL,
  `fattura_iva` float(10,2) NOT NULL DEFAULT '0.00',
  `fattura_tot_fattura` float(10,2) NOT NULL DEFAULT '0.00',
  `fattura_note_fattura` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_ditta1` int(11) NOT NULL,
  `id_ditta2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `fattura`
--

INSERT INTO `fattura` (`fattura_id`, `fattura_num_fattura`, `descrizione`, `fattura_data_fattura`, `fattura_data_pagamento`, `fattura_imponibile`, `percentuale_IVA`, `fattura_iva`, `fattura_tot_fattura`, `fattura_note_fattura`, `id_ditta1`, `id_ditta2`) VALUES
(1, 1, 'BLUIT-SOU-1400575', '2017-06-01', '2017-06-23', 3645.00, 22, 801.90, 4446.90, 'pagamento 90 giorni IBAN: IT18C0326801008052669286370', 14, 11),
(2, 2, 'fattura numero 2', '2017-06-08', '2017-06-21', 5000.00, 0, 1200.00, 6200.00, 'pagamento 90 giorni isbn 1233456', 1, 15),
(3, 3, 'fattura numero 3', '2017-07-04', NULL, 1000.00, 0, 100.00, 1100.00, NULL, 1, 10),
(4, 4, 'fattura numero 4', '2016-06-01', '2017-06-23', 1000.00, 0, 220.00, 1220.00, 'pagamento 90 giorni isbn 1233456', 14, 11),
(5, 5, 'fattura numero 5', '2017-06-08', '2016-06-21', 5000.00, 0, 1200.00, 6200.00, 'pagamento 90 giorni isbn 1233456', 1, 15),
(6, 6, 'fattura numero 6', '2017-07-04', NULL, 1000.00, 0, 100.00, 1100.00, NULL, 1, 10),
(7, 4, 'fattura numero 4', '2017-06-01', '2017-06-23', 1000.00, 0, 220.00, 1220.00, 'pagamento 90 giorni isbn 1233456', 14, 11),
(8, 5, 'fattura numero 5', '2017-06-08', '2017-06-21', 5000.00, 0, 1200.00, 6200.00, 'pagamento 90 giorni isbn 1233456', 1, 15),
(9, 6, 'fattura numero 6', '2017-07-04', NULL, 1000.00, 0, 100.00, 1100.00, NULL, 1, 10),
(10, 7, 'fattura numero 7', '2017-06-01', '2017-06-23', 1000.00, 0, 220.00, 1220.00, 'pagamento 90 giorni isbn 1233456', 14, 11),
(11, 8, 'fattura numero 8', '2017-06-08', '2017-06-21', 5000.00, 0, 1200.00, 6200.00, 'pagamento 90 giorni isbn 1233456', 1, 15),
(12, 9, 'fattura numero 9', '2017-07-04', NULL, 1000.00, 0, 100.00, 1100.00, NULL, 1, 10),
(13, 10, 'fattura numero 10', '2017-06-01', '2017-06-23', 1000.00, 0, 220.00, 1220.00, 'pagamento 90 giorni isbn 1233456', 14, 11),
(14, 11, 'fattura numero 11', '2017-06-08', '2017-06-21', 5000.00, 0, 1200.00, 6200.00, 'pagamento 90 giorni isbn 1233456', 1, 15),
(15, 12, 'fattura numero 12', '2017-07-04', NULL, 1000.00, 0, 100.00, 1100.00, NULL, 1, 10),
(16, 13, 'fattura numero 13', '2017-06-01', '2017-06-23', 1000.00, 0, 220.00, 1220.00, 'pagamento 90 giorni isbn 1233456', 14, 11),
(17, 14, 'fattura numero 14', '2017-06-08', '2017-06-21', 5000.00, 0, 1200.00, 6200.00, 'pagamento 90 giorni isbn 1233456', 1, 15),
(18, 15, 'fattura numero 15', '2017-07-04', NULL, 1000.00, 0, 100.00, 1100.00, NULL, 1, 10),
(19, 16, 'fattura numero 16', '2017-06-01', '2017-06-23', 1000.00, 0, 220.00, 1220.00, 'pagamento 90 giorni isbn 1233456', 14, 11),
(20, 17, 'fattura numero 17', '2017-06-08', '2017-06-21', 5000.00, 0, 1200.00, 6200.00, 'pagamento 90 giorni isbn 1233456', 1, 15),
(21, 18, 'fattura numero 18', '2017-07-04', NULL, 1000.00, 0, 100.00, 1100.00, NULL, 1, 10);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `fattura`
--
ALTER TABLE `fattura`
  ADD PRIMARY KEY (`fattura_id`),
  ADD KEY `fk_fatt_ditta1` (`id_ditta1`),
  ADD KEY `fk_fatt_ditta2` (`id_ditta2`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `fattura`
--
ALTER TABLE `fattura`
  MODIFY `fattura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `fattura`
--
ALTER TABLE `fattura`
  ADD CONSTRAINT `fk_fatt_ditta1` FOREIGN KEY (`id_ditta1`) REFERENCES `ditta` (`id_ditta`),
  ADD CONSTRAINT `fk_fatt_ditta2` FOREIGN KEY (`id_ditta2`) REFERENCES `ditta` (`id_ditta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
