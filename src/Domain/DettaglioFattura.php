<?php

namespace gestionefinanziaria\Domain;

class DettaglioFattura {

    /**
     * Dettaglio id. 
     * @var integer
     */
    private $id;

    /**
     * Descrizione dettaglio fattura.
     * @var string
     */
    private $descrizione;

    /**
     * Quantità.
     * @var integer
     */
    private $qta;

    /**
     * Unità misura della quantità.
     * @var integer
     */
    private $unitaMisuraQta;

    /**
     * Tariffa.
     * @var float
     */
    private $tariffa;

    /**
     * Dettaglio fattura timestamp.
     * @var timestamp
     */
    private $dettaglioFatturaTimeStamp;

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

    public function getQta() {
        return $this->qta;
    }

    public function setQta($qta) {
        $this->qta = $qta;
    }
    
    
    public function getUnitaMisuraQta() {
        return $this->unitaMisuraQta;
    }

    public function setUnitaMisuraQta($unitaMisuraQta) {
        $this->unitaMisuraQta = $unitaMisuraQta;
    }
    
    public function getTariffa() {
        return $this->tariffa;
    }

    public function setTariffa($tariffa) {
        $this->tariffa = $tariffa;
    }    
        
    public function getDettaglioFatturaTimeStamp() {
        return $this->dettaglioFatturaTimeStamp;
    }

    public function setDettaglioFatturaTimeStamp($dettaglioFatturaTimeStamp) {
        $this->dettaglioFatturaTimeStamp = $dettaglioFatturaTimeStamp;
    }    
    
    public function getFattura() {
        return $this->fattura;
    }

    public function setFattura(Fattura $fattura) {
        $this->fattura = $fattura;
    }
}
