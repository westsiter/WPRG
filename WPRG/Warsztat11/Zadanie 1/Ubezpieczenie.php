<?php

class Ubezpieczenie extends AutoZDodatkami {
    private $procentWartosciUbezpieczenia;
    private $lataPosiadania;

    public function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja, $procentWartosciUbezpieczenia, $lataPosiadania) {
        parent::__construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja);
        $this->procentWartosciUbezpieczenia = $procentWartosciUbezpieczenia;
        $this->lataPosiadania = $lataPosiadania;
    }

    public function getProcentWartosciUbezpieczenia() {
        return $this->procentWartosciUbezpieczenia;
    }

    public function getLataPosiadania() {
        return $this->lataPosiadania;
    }

    public function setProcentWartosciUbezpieczenia($procentWartosciUbezpieczenia) {
        $this->procentWartosciUbezpieczenia = $procentWartosciUbezpieczenia;
    }

    public function setLataPosiadania($lataPosiadania) {
        $this->lataPosiadania = $lataPosiadania;
    }

    public function ObliczCene() {
        $cenaZDodatkami = parent::ObliczCene();
        $ubezpieczenie = $this->procentWartosciUbezpieczenia * ($cenaZDodatkami * ((100 - $this->lataPosiadania) / 100));
        return $cenaZDodatkami + $ubezpieczenie;
    }
}
?>
