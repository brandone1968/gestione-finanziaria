<?php

namespace gestionefinanziaria\DAO;

use gestionefinanziaria\Domain\Scadenza;

class ScadenzaDAO extends DAO {

    /**
     * Return a list of all Scadenze, sorted by date (most recent first).
     * @return array A list of all scadenze.
     */
    public function findAll() {
        $meseCorrente = date("m");
        $sql = "select * from scadenza where DATE_FORMAT(data_scadenza,'%m') = $meseCorrente order by DATE_FORMAT(data_scadenza,'%m') asc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $scadenze = array();
        foreach ($result as $row) {
            $scadenzaId = $row['id'];
            $scadenze[$scadenzaId] = $this->buildDomainObject($row);
        }
        return $scadenze;
    }

    /**
     * Creates an Scadenza object based on a DB row.
     *
     * @param array $row The DB row containing Scadenza data.
     * @return \gestionefinanziaria\Domain\Scadenza
     */
    protected function buildDomainObject(array $row) {
        $scadenza = new Scadenza();
        $scadenza->setId($row['id']);
        $scadenza->setDescrizione($row['descrizione']);
        $scadenza->setDataScadenza($row['data_scadenza']);
        return $scadenza;
    }

}
