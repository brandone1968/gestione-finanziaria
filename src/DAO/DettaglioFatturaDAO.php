<?php

namespace gestionefinanziaria\DAO;

use gestionefinanziaria\Domain\DettaglioFattura;

class DettaglioFatturaDAO extends DAO {

    /**
     * @var \gestionefinanziaria\DAO\FatturaDAO
     */
    private $fatturaDAO;

    public function setFatturaDAO(FatturaDAO $fatturaDAO) {
        $this->fatturaDAO = $fatturaDAO;
    }

    /**
     * Return a list of all dettagli for an fattura, sorted by date (most recent last).
     *
     * @param integer $fatturaId The fattura id.
     *
     * @return array A list of all dattagli for the fattura.
     */
    public function findAllByFattura($fatturaId) {
        // The associated fattura is retrieved only once
        $fattura = $this->fatturaDAO->find($fatturaId);

        // fattura_id is not selected by the SQL query
        // The fattura  won't be retrieved during domain objet construction
        $sql = "select dettaglio_id, descrizione, qta, unita_misura_qta, tariffa, dettaglio_fattura_time_stamp from dettaglio_fattura where fattura_id=? order by dettaglio_id";
        $result = $this->getDb()->fetchAll($sql, array($fatturaId));

        // Convert query result to an array of domain objects
        $dettagli = array();
        foreach ($result as $row) {
            $dettaglioId = $row['dettaglio_id'];
            $dettaglio = $this->buildDomainObject($row);
            // The associated fattura is defined for the constructed dettaglio fattura
            $dettaglio->setFattura($fattura);
            $dettagli[$dettaglioId] = $dettaglio;
        }
        return $dettagli;
    }

    /**
     * Creates an Dettaglio object based on a DB row.
     *
     * @param array $row The DB row containing Dettaglio data.
     * @return \gestionefinanziaria\Domain\Dettaglio
     */
    protected function buildDomainObject(array $row) {
        $dettaglio = new DettaglioFattura();
        $dettaglio->setId($row['dettaglio_id']);
        $dettaglio->setDescrizione($row['descrizione']);
        $dettaglio->setQta($row['qta']);
        $dettaglio->setUnitaMisuraQta($row['unita_misura_qta']);
        $dettaglio->setTariffa($row['tariffa']);
        $dettaglio->setDettaglioFatturaTimeStamp($row['dettaglio_fattura_time_stamp']);

        if (array_key_exists('fattura_id', $row)) {
            // Find and set the associated fattura
            $fatturaId = $row['fattura_id'];
            $fattura = $this->fatturaDAO->find($fatturaId);
            $dettaglio->setFattura($fattura);
        }

        return $dettaglio;
    }

}
