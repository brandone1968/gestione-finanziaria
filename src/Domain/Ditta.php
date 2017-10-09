<?php

namespace gestionefinanziaria\Domain;

class Ditta {

    /**
     * Ditta id. 
     * @var integer
     */
    private $id_ditta;

    /**
     * Denominazione ditta.
     * @var string
     */
    private $denominazione;

    /**
     * Indirizzo.
     * @var string
     */
    private $indirizzo;

    /**
     * CAP ditta.
     * @var integer
     */
    private $cap;

    /**
     * Citta.
     * @var string
     */
    private $citta;

    /**
     * Ditta Codice fiscale. 
     * @var string
     */
    private $cf;

    /**
     * Partita Iva Ditta. 
     * @var string
     */
    private $piva;

    /**
     * Default_immissione Ditta. 
     * @var boolean
     */
    private $default_immissione;

    /**
     * ditta timestamp.
     * @var timestamp
     */
    private $dittaTimeStamp;

    public function getIdDitta() {
        return $this->id_ditta;
    }

    public function setIdDitta($id_ditta) {
        $this->id_ditta = $id_ditta;
    }

    public function getDenominazione() {
        return $this->denominazione;
    }

    public function setDenominazione($denominazione) {
        $this->denominazione = $denominazione;
    }

    public function getIndirizzo() {
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo) {
        $this->indirizzo = $indirizzo;
    }

    public function getCap() {
        return $this->cap;
    }

    public function setCap($cap) {
        $this->cap = $cap;
    }

    public function getCitta() {
        return $this->citta;
    }

    public function setCitta($citta) {
        $this->citta = $citta;
    }

    public function setCf($cf) {
        $this->cf = $cf;
    }

    public function getCf() {
        return $this->cf;
    }

    public function setPiva($piva) {
        $this->piva = $piva;
    }

    public function getPiva() {
        return $this->piva;
    }

    public function setDefaultImmissione($default_immissione) {
        $this->default_immissione = $default_immissione;
    }

    public function getDefaultImmissione() {
        return $this->default_immissione;
    }

    public function getDittaTimeStamp() {
        return $this->dettaglioFatturaTimeStamp;
    }

    public function setDittaTimeStamp($dittaTimeStamp) {
        $this->dittaTimeStamp = $dittaTimeStamp;
    }

    public function getFattura() {
        return $this->fattura;
    }

    public function setFattura(Fattura $fattura) {
        $this->fattura = $fattura;
    }

}
