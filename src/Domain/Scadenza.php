<?php

namespace gestionefinanziaria\Domain;

class Scadenza {

    /**
     * Scadenza id.
     * @var integer
     */
    private $id;

    /**
     * Descrizione Scadenza.
     * @var string
     */
    private $descrizione;

    /**
     * Data della scadenza.
     * @var date
     */
    private $dataScadenza;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescrizione() {
        return $this->descrizione;
    }

    public function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }

    public function getDataScadenza() {
        return $this->dataScadenza;
    }

    public function setDataScadenza($dataScadenza) {
        $this->dataScadenza = $dataScadenza;
    }

}
