-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Giu 12, 2017 alle 18:52
-- Versione del server: 5.5.27
-- Versione PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

drop table if exists dettaglio_fattura;

create table dettaglio_fattura (
  dettaglio_id integer not null primary key auto_increment,
  descrizione varchar(255) NOT NULL DEFAULT '',
  qta int(3) NOT NULL DEFAULT '0',
  unita_misura_qta int(1) NOT NULL DEFAULT '0',
  tariffa float(10,2) NOT NULL DEFAULT '0.00',
  dettaglio_fattura_time_stamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  fattura_id integer not null,
  constraint fk_com_art foreign key(fattura_id) references fattura(fattura_id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

