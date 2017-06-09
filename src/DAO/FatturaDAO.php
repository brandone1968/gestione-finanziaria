<?php

namespace gestionefinanziaria\DAO;

use Doctrine\DBAL\Connection;
use gestionefinanziaria\Domain\Fattura;

class FatturaDAO
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Return a list of all Fatture, sorted by date (most recent first).
     *
     * @return array A list of all fatture.
     */
    public function findAll() {
        $sql = "select * from fattura order by fattura_id desc";
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $fatture = array();
        foreach ($result as $row) {
            $fatturaId = $row['fattura_id'];
            $fatture[$fatturaId] = $this->buildFattura($row);
        }
        return $fatture;
    }

    /**
     * Creates an Fattura object based on a DB row.
     *
     * @param array $row The DB row containing Fattura data.
     * @return \gestionefinanziaria\Domain\Fattura
     */
    private function buildFattura(array $row) {
        $fattura = new Fattura();
        $fattura->setId($row['fattura_id']);
        $fattura->setNumFattura($row['fattura_num_fattura']);
        $fattura->setDataFattura($row['fattura_data_fattura']);
        $fattura->setDataPagamento($row['fattura_data_pagamento']);
        $fattura->setImponibile($row['fattura_imponibile']);
        $fattura->setIva($row['fattura_iva']);
        $fattura->setTotFattura($row['fattura_tot_fattura']);
        $fattura->setNoteFattura($row['fattura_note_fattura']);
        return $fattura;
    }
}
