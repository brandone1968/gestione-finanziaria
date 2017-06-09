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

drop table if exists invoice;

create table invoice (
id integer not null primary key auto_increment,
art_title varchar(100) not null,
art_content varchar(2000) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;