drop table if exists scadenza;

create table scadenza (
id integer not null primary key auto_increment,
descrizione varchar(255) not null DEFAULT '',
data_scadenza date NOT NULL DEFAULT '0000-00-00'
) engine=innodb character set utf8 collate utf8_unicode_ci;


--
-- Dump dei dati per la tabella scadenze
--

INSERT INTO scadenza (descrizione, data_scadenza) VALUES
('Mio compleanno', '1968-08-30'),
('Compleanno Patrizia', '1967-11-05'),
('Versamento IVA trimestrale 1 trimestre', '2005-05-16'),
('INPS', '2005-06-20'),
('IRAP acconto prima rata', '2005-06-20'),
('Versamento IVA trimestrale 2 trimestre', '2005-08-22'),
('Versamento IVA trimestrale 3 trimestre', '2005-11-16'),
('INPS', '2005-11-30'),
('IRAP acconto seconda rata', '2005-11-30'),
('Versamento IVA acconto', '2005-12-27'),
('Versamento IVA sulla base della dichiarazione annuale', '2005-03-16'),
('saldo IRPEF', '2005-06-20'),
('INPS', '2005-06-20'),
('IRAP', '2005-06-20'),
('addizionare regionale IRPEF', '2005-06-20'),
('addizionale comunale IRPEF', '2005-06-20'),
('IRPEF acconto - prima rata', '2005-06-20'),
('IRPEF acconto - seconda rata', '2005-11-30'),
('compleanno Mamma', '1937-09-18'),
('compleanno Patrizia', '1967-11-05'),
('compleanno Marina', '1961-04-18'),
('compleanno Alessandro', '1993-06-22'),
('compleanno Valentina', '1993-06-22');


