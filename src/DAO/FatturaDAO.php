<?php

namespace gestionefinanziaria\DAO;

use gestionefinanziaria\Domain\Fattura;

class FatturaDAO extends DAO {

    /**
     * Return a list of all Fatture, sorted by date (most recent first).
     *
     * @return array A list of all fatture.
     */
    public function findAll() {
        $sql = "select * from fattura order by fattura_id asc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $fatture = array();
        foreach ($result as $row) {
            $fatturaId = $row['fattura_id'];
            $fatture[$fatturaId] = $this->buildDomainObject($row);
        }
        return $fatture;
    }

    /**
     * Returns an fattura matching the supplied id.
     *
     * @param integer $id
     *
     * @return \gestionefinanziaria\Domain\Fattura|throws an exception if no matching fattura is found
     */
    public function find($id) {

        $sql = "select * from fattura where fattura_id=?";

        $row = $this->getDb()->fetchAssoc($sql, array($id));



        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No fattura matching id " . $id);
    }

    /**
     * Creates an Fattura object based on a DB row.
     *
     * @param array $row The DB row containing Fattura data.
     * @return \gestionefinanziaria\Domain\Fattura
     */
    protected function buildDomainObject(array $row) {
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
