<?php

namespace gestionefinanziaria\DAO;

use gestionefinanziaria\Domain\Fattura;
use gestionefinanziaria\Domain\Ditta;

class FatturaDAO extends DAO {

    /**
     * Return a list of all Fatture, sorted by date (most recent first).
     *
     * @return array A list of all fatture.
     */
    public function findAll($tipoPagamento, $anno) {
        //$sql = "select * from fattura order by fattura_id asc";
        //$sql = "select * from fattura Join ditta as ditta1 on id_ditta1 = ditta1.id_ditta Join ditta as ditta2 on id_ditta2 = ditta2.id_ditta order by fattura_id asc";
        $sql = "select 
                fattura_id, fattura_num_fattura, descrizione, fattura_data_fattura, fattura_data_pagamento, fattura_imponibile, percentuale_IVA, fattura_iva,
                fattura_tot_fattura, fattura_note_fattura, id_ditta1, id_ditta2,
                ditta1.id_ditta as id_ditta1, ditta1.denominazione as denominazione1, ditta1.indirizzo as indirizzo1, ditta1.cap as cap1, ditta1.citta as citta1, ditta1.cf as cf1, ditta1.piva as piva1, ditta1.default_immissione as default_immissione1, ditta1.ditta_time_stamp as ditta_time_stamp1,
                ditta2.id_ditta as id_ditta2, ditta2.denominazione as denominazione2, ditta2.indirizzo as indirizzo2, ditta2.cap as cap2, ditta2.citta as citta2, ditta2.cf as cf2, ditta2.piva as piva2, ditta2.default_immissione as default_immissione2, ditta2.ditta_time_stamp as ditta_time_stamp2
                from fattura 
                Join ditta as ditta1 on id_ditta1 = ditta1.id_ditta
                Join ditta as ditta2 on id_ditta2 = ditta2.id_ditta";
        if ($tipoPagamento == 0) {
            $sql .= " where YEAR(fattura_data_fattura)=?";
        } else {
            $sql .= " where YEAR(fattura_data_pagamento)=?";
        }                
        $sql .= " order by fattura_id asc";
        
        $result = $this->getDb()->fetchAll($sql, array($anno));

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

        $sql = "select fattura_id, fattura_num_fattura, descrizione, fattura_data_fattura, fattura_data_pagamento, fattura_imponibile, percentuale_IVA, fattura_iva,
                fattura_tot_fattura, fattura_note_fattura, id_ditta1, id_ditta2,
                ditta1.id_ditta as id_ditta1, ditta1.denominazione as denominazione1, ditta1.indirizzo as indirizzo1, ditta1.cap as cap1, ditta1.citta as citta1, ditta1.cf as cf1, ditta1.piva as piva1, ditta1.default_immissione as default_immissione1, ditta1.ditta_time_stamp as ditta_time_stamp1,
                ditta2.id_ditta as id_ditta2, ditta2.denominazione as denominazione2, ditta2.indirizzo as indirizzo2, ditta2.cap as cap2, ditta2.citta as citta2, ditta2.cf as cf2, ditta2.piva as piva2, ditta2.default_immissione as default_immissione2, ditta2.ditta_time_stamp as ditta_time_stamp2
                from fattura
                Join ditta as ditta1 on id_ditta1 = ditta1.id_ditta
                Join ditta as ditta2 on id_ditta2 = ditta2.id_ditta
                where fattura_id=?";

        $row = $this->getDb()->fetchAssoc($sql, array($id));



        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No fattura matching id " . $id);
    }

    /**
     * Ritorna elenco degli anni di emissione delle fatture.
     *
     * @return \gestionefinanziaria\Domain\Fattura|throws an exception if no matching fattura is found
     */
    public function findAllYearIssue() {
        $sql = "select 
                distinct YEAR(fattura_data_fattura) as annoSelezionabile
                from fattura
                order by fattura_data_fattura desc";
        $anniSelezionabili = array();
        $i = 0;
        $result = $this->getDb()->fetchAll($sql);
        foreach ($result as $row) {
            $anniSelezionabili[$i] = $row['annoSelezionabile'];
            $i++;
        }        
       
        return $anniSelezionabili;
    }
    
     /**
     * Ritorna elenco degli anni di incasso delle fatture.
     *
     * @return \gestionefinanziaria\Domain\Fattura|throws an exception if no matching fattura is found
     */
    public function findAllYearBalance() {
        $sql = "select 
                distinct YEAR(fattura_data_pagamento) as annoSelezionabile
                from fattura
                where fattura_data_pagamento IS NOT NULL
                order by fattura_data_pagamento desc";
        
        $anniSelezionabili = array();
        $i = 0;
        $result = $this->getDb()->fetchAll($sql);
        foreach ($result as $row) {
            $anniSelezionabili[$i] = $row['annoSelezionabile'];
            $i++;
        }        
       
        return $anniSelezionabili;
    }
    
     /**
     * Ritorna il primo numero disponibile dell'anno per una nuova fattura.
     * Se non ci sono fatture per l'anno richiesto viene ritornato 1
     *
     * @param string $anno
     *
     * @return \gestionefinanziaria\Domain\Fattura|throws an exception if no matching fattura is found
     */
    public function findPrimoNumeroLibero($anno) {
        $sql = "select 
                max(fattura_num_fattura) as numFattura
                from fattura
                where YEAR(fattura_data_fattura) =?";
 
        $row = $this->getDb()->fetchAssoc($sql, array($anno));
        
        if ($row)
            $numFattura = $row['numFattura'] +1;
        else
            $numFattura = 1;

        return $numFattura;
    }
    

    
        public function save(Fattura $fattura) {
        // il campo data fattura deve essere trasformato da oggetto data a yyyy-mm-dd
        // perchè possa essere salvato
        $fatturaData = array(
            'fattura_num_fattura' => $fattura->getNumFattura(),
            'descrizione' => $fattura->getDescrizione(),
            'id_ditta1' => $fattura->getDitta1()->getIdDitta(),
            'id_ditta2' => $fattura->getDitta2()->getIdDitta(),
            'fattura_data_fattura' => $fattura->getDataFattura()->format('Y-m-d')
            );

        if ($fattura->getId()) {
            // La fattura è già presente, quindi è da aggiornare
            $this->getDb()->update('fattura', $fatturaData, array('fattura_id' => $fattura->getId()));
        } else {
            // La fattura non è presente, è nuova, quindi è da inserire
            $this->getDb()->insert('fattura', $fatturaData);
            // Get the id of the newly created comment and set it on the entity.
            //$id = $this->getDb()->lastInsertId();
            //$comment->setId($id);
        }
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
        $fattura->setDescrizione($row['descrizione']);
        $fattura->setDataFattura($row['fattura_data_fattura']);
        $fattura->setDataPagamento($row['fattura_data_pagamento']);
        $fattura->setImponibile($row['fattura_imponibile']);
        $fattura->setPercentualeIva($row['percentuale_IVA']);
        $fattura->setIva($row['fattura_iva']);
        $fattura->setTotFattura($row['fattura_tot_fattura']);
        $fattura->setNoteFattura($row['fattura_note_fattura']);

        $ditta1 = new Ditta();
        $ditta1->setIdDitta($row['id_ditta1']);
        $ditta1->setDenominazione($row['denominazione1']);
        $ditta1->setIndirizzo($row['indirizzo1']);
        $ditta1->setCap($row['cap1']);
        $ditta1->setCitta($row['citta1']);
        $ditta1->setCf($row['cf1']);
        $ditta1->setPiva($row['piva1']);
        $ditta1->setDefaultImmissione($row['default_immissione1']);
        //$ditta1->setDittaTimeStamp($row['ditta_time_stamp1']);
        $fattura->setDitta1($ditta1);

        $ditta2 = new Ditta();
        $ditta2->setIdDitta($row['id_ditta2']);
        $ditta2->setDenominazione($row['denominazione2']);
        $ditta2->setIndirizzo($row['indirizzo2']);
        $ditta2->setCap($row['cap2']);
        $ditta2->setCitta($row['citta2']);
        $ditta2->setCf($row['cf2']);
        $ditta2->setPiva($row['piva2']);
        $ditta2->setDefaultImmissione($row['default_immissione2']);
        //$ditta2->setDittaTimeStamp($row['ditta_time_stamp2']);
        $fattura->setDitta2($ditta2);

        return $fattura;
    }

}
