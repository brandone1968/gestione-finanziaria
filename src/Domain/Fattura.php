<?php

namespace gestionefinanziaria\Domain;

class Fattura {

    /**
     * Fattura id.
     *
     * @var integer
     */
    private $id;

    /**
     * Numero Fattura.
     *
     * @var integer
     */
    private $numFattura;

    /**
     * Data emissione Fattura.
     *
     * @var date
     */
    private $dataFattura;

    /**
     * Data pagamento Fattura.
     *
     * @var date
     */
    private $dataPagamento;

    /**
     * Imponibile Fattura.
     *
     * @var float(10.2)
     */
    private $imponibile;

    /**
     * IVA Fattura.
     *
     * @var float(10.2)
     */
    private $iva;

    /**
     * Totale Fattura.
     *
     * @var float(10.2)
     */
    private $totFattura;

    /**
     * Note Fattura.
     *
     * @var string
     */
    private $noteFattura;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getNumFattura() {
        return $this->numFattura;
    }

    public function setNumFattura($numFattura) {
        $this->numFattura = $numFattura;
        return $this;
    }

    public function getDataFattura() {
        return $this->dataFattura;
    }

    public function setDataFattura($dataFattura) {
        $this->dataFattura = $dataFattura;
        return $this;
    }

    public function getDataPagamento() {
        return $this->dataPagamento;
    }

    public function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
        return $this;
    }

    public function getImponibile() {
        return $this->imponibile;
    }

    public function setImponibile($imponibile) {
        $this->imponibile = $imponibile;
        return $this;
    }

    public function getIva() {
        return $this->iva;
    }

    public function setIva($iva) {
        $this->iva = $iva;
        return $this;
    }

    public function getTotFattura() {
        return $this->totFattura;
    }

    public function setTotFattura($totFattura) {
        $this->totFattura = $totFattura;
        return $this;
    }

    public function getNoteFattura() {
        return $this->noteFattura;
    }

    public function setNoteFattura($noteFattura) {
        $this->noteFattura = $noteFattura;
        return $this;
    }

}
