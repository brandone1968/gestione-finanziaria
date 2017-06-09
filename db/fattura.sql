-- id
-- numero fattura
-- data fattura
-- anagrafica_emittente
-- anagrafica_cliente
-- dettaglio_id
-- data pagamento
-- percorso pdf
-- imponibile 
-- rivalsa 
-- tot_imponibile 
-- iva  
-- tot_fattura 
-- ritenuta_acconto  
-- tot_netto
-- note
-- timestamp

drop table if exists fattura;

create table fattura (
fattura_id integer not null primary key auto_increment,
fattura_num_fattura integer not null,
fattura_data_fattura date not null,
fattura_data_pagamento date default null,
fattura_imponibile float(10,2) not null default '0.00',
fattura_iva float(10,2) not null default '0.00',
fattura_tot_fattura float(10,2) not null default '0.00',
fattura_note_fattura varchar(2000) 
) engine=innodb character set utf8 collate utf8_unicode_ci;