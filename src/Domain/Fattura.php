<?php

namespace gestionefinanziaria\Domain;
use gestionefinanziaria\Domain\Ditta;

class Fattura {

    /**
     * Fattura id.
     * @var integer
     */
    private $id;

    /**
     * Numero Fattura.
     * @var integer
     */
    private $numFattura;

    /**
     * Descrizione Fattura.
     * @var string
     */
    private $descrizione;
    
    /**
     * Data emissione Fattura.
     * @var date
     */
    private $dataFattura;

    /**
     * Data pagamento Fattura.
     * @var date
     */
    private $dataPagamento;

    /**
     * Imponibile Fattura.
     * @var float(10.2)
     */
    private $imponibile;

    /**
     * IVA Fattura.
     * @var float(10.2)
     */
    private $iva;

    /**
     * Totale Fattura.
     * @var float(10.2)
     */
    private $totFattura;

    private $ditta1;
    
    private $ditta2;
    /**
     * Note Fattura.
     * @var string
     */
    private $noteFattura;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNumFattura() {
        return $this->numFattura;
    }

    public function setNumFattura($numFattura) {
        $this->numFattura = $numFattura;
    }

        public function getDescrizione() {
        return $this->descrizione;
    }

    public function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }
    
    public function getDataFattura() {
        return $this->dataFattura;
    }

    public function setDataFattura($dataFattura) {
        $this->dataFattura = $dataFattura;
    }

    public function getDataPagamento() {
        return $this->dataPagamento;
    }

    public function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    public function getImponibile() {
        return $this->imponibile;
    }

    public function setImponibile($imponibile) {
        $this->imponibile = $imponibile;
    }

    public function getIva() {
        return $this->iva;
    }

    public function setIva($iva) {
        $this->iva = $iva;
    }

    public function getTotFattura() {
        return $this->totFattura;
    }

    public function setTotFattura($totFattura) {
        $this->totFattura = $totFattura;
    }

    public function getNoteFattura() {
        return $this->noteFattura;
    }

    public function setNoteFattura($noteFattura) {
        $this->noteFattura = $noteFattura;
    }

    public function getDitta1() {
        return $this->ditta1;
    }

    public function setDitta1(Ditta $ditta1) {
        $this->ditta1 = $ditta1;
    }
    
        public function getDitta2() {
        return $this->ditta2;
    }

    public function setDitta2(Ditta $ditta2) {
        $this->ditta2 = $ditta2;
    }
}
