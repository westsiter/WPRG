<?php

class NoweAuto {
    protected $model;
    protected $cenaEuro;
    protected $kursEuroPLN;

    public function __construct($model, $cenaEuro, $kursEuroPLN) {
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuroPLN = $kursEuroPLN;
    }

    public function getModel() {
        return $this->model;
    }

    public function getCenaEuro() {
        return $this->cenaEuro;
    }

    public function getKursEuroPLN() {
        return $this->kursEuroPLN;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setCenaEuro($cenaEuro) {
        $this->cenaEuro = $cenaEuro;
    }

    public function setKursEuroPLN($kursEuroPLN) {
        $this->kursEuroPLN = $kursEuroPLN;
    }

    public function ObliczCene() {
        return $this->cenaEuro * $this->kursEuroPLN;
    }
}
?>
