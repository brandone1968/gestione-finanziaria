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
     * Return a list of all ditta ordinato per ordine alfabetico della descrizione
     * @param integer $fatturaId The fattura id.
     * @return array A list of all dattagli for the fattura.
     */
    public function findAll() {

        $sql = "select id_ditta, denominazione, indirizzo, cap, citta, cf, piva, default_immissione, ditta_time_stamp";
        $sql .= " from ditta order by denominazione asc";

        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $ditte = array();
        foreach ($result as $row) {
            $dittaId = $row['id_ditta'];
            $ditte[$dittaId] = $this->buildDomainObject($row);
        }
        return $ditte;
    }

    /**
     * Return a list of all ditta ordinato per ordine alfabetico della descrizione
     * @param integer $fatturaId The fattura id.
     * @return array A list of all dattagli for the fattura.
     */
    public function findAllElencoSelect() {

        $sql = "select id_ditta, denominazione";
        $sql .= " from ditta order by denominazione asc";

        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $elencoDitteSelect = array();
        foreach ($result as $row) {
            $id = $row['id_ditta'];
            $descrizione = $row['denominazione'];
            //$elencoDitteSelect[$id]=$descrizione;
            $elencoDitteSelect[$descrizione] = $id;
        }
        return $elencoDitteSelect;
    }

     /**
     * Return ditta di default che emette la fattura
     * @param null.
     * @return array ditta1.
     */
    public function findDefaultEmette() {

        $sql = "select id_ditta, denominazione, indirizzo, cap, citta, cf, piva, default_immissione, ditta_time_stamp";
        $sql .= " from ditta where default_immissione=?";

        $row = $this->getDb()->fetchAssoc($sql, array(1));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No ditta matching id " . 1);
    }
    
    
     /**
     * Return ditta di default come cliente
     * @param null.
     * @return array ditta1.
     */
    public function findDefaultCliente() {

        $sql = "select id_ditta, denominazione, indirizzo, cap, citta, cf, piva, default_immissione, ditta_time_stamp";
        $sql .= " from ditta where default_immissione=?";

        $row = $this->getDb()->fetchAssoc($sql, array(2));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No ditta matching id " . 2);
    }
    

    /**
     * Creates an Ditta object based on a DB row.
     *
     * @param array $row The DB row containing Ditta data.
     * @return \gestionefinanziaria\Domain\Ditta
     */
    protected function buildDomainObject(array $row) {
        $ditta = new Ditta();
        $ditta->setIdDitta($row['id_ditta']);
        $ditta->setDenominazione($row['denominazione']);
        $ditta->setIndirizzo($row['indirizzo']);
        $ditta->setCap($row['cap']);
        $ditta->setCitta($row['citta']);
        $ditta->setCf($row['cf']);
        $ditta->setPiva($row['piva']);
        $ditta->setDefaultImmissione($row['default_immissione']);
        $ditta->setDittaTimeStamp($row['ditta_time_stamp']);

        return $ditta;
    }

}
