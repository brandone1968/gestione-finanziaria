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
        return $this->title;
    }

    public function setNumFattura($numFattura) {
        $this->title = $numFattura;
        return $this;
    }

    public function getDataFattura() {
        return $this->content;
    }

    public function setDataFattura($dataFattura) {
        $this->content = $dataFattura;
        return $this;
    }

    public function getDataPagamento() {
        return $this->content;
    }

    public function setDataPagamento($dataPagamento) {
        $this->content = $dataPagamento;
        return $this;
    }

    public function getImponibile() {
        return $this->content;
    }

    public function setImponibile($imponibile) {
        $this->content = $imponibile;
        return $this;
    }

    public function getIva() {
        return $this->content;
    }

    public function setIva($iva) {
        $this->content = $iva;
        return $this;
    }

    public function getTotFattura() {
        return $this->content;
    }

    public function setTotFattura($totFattura) {
        $this->content = $totFattura;
        return $this;
    }

    public function getNoteFattura() {
        return $this->content;
    }

    public function setNoteFattura($noteFattura) {
        $this->content = $noteFattura;
        return $this;
    }

}
