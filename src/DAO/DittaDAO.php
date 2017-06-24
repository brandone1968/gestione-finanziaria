<?php

namespace gestionefinanziaria\DAO;

use gestionefinanziaria\Domain\Ditta;

class DittaDAO extends DAO {



    /**
     * Return a list of all dettagli for an fattura, sorted by date (most recent last).
     * @param integer $fatturaId The fattura id.
     * @return array A list of all dattagli for the fattura.
     */
    public function findAllByFattura($id_ditta) {
        
        //----------------------------------------------
        // !!!!!!!!!!!!!    DA FARE     !!!!!!!!!!!!
        //----------------------------------------------
        //
        
        // Convert query result to an array of domain objects
        $ditte = array();
        foreach ($result as $row) {
            $dittaId = $row['ditta_id'];
            $ditta = $this->buildDomainObject($row);
            // The associated fattura is defined for the constructed dettaglio fattura
            $ditta->setFattura($fattura);
            $ditta[$dittaId] = $ditta;
        }
        return $ditte;
    }

    /**
     * Creates an Ditta object based on a DB row.
     *
     * @param array $row The DB row containing Ditta data.
     * @return \gestionefinanziaria\Domain\Ditta
     */
    protected function buildDomainObject(array $row) {
        $ditta = new Ditta();
        $ditta->setId($row['id_ditta']);
        $ditta->setDenominazione($row['denominazione']);
        $ditta->setIndirizzo($row['indirizzo']);
        $ditta->setCap($row['cap']);
        $ditta->setCitta($row['citta']);
        $ditta->setCf($row['cf']);
        $ditta->setPiva($row['piva']);
        $ditta->setDefaultEmissione($row['default_immissione']);
        $ditta->setDittaTimeStamp($row['ditta_time_stamp']);

        if (array_key_exists('id_ditta', $row)) {
            // Find and set the associated fattura
            $fatturaId = $row['fattura_id'];
            $fattura = $this->fatturaDAO->find($fatturaId);
            $ditta->setFattura($fattura);
        }

        return $ditta;
    }

}
