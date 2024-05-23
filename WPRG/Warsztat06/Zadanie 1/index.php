<?php
function Czy_pierwsza($liczba) {

    if ($liczba < 1)  return false;

    if ($liczba == 3) return true;

    if ($liczba % 2 == 0 || $liczba % 3 == 0) return false;

    for ($i = 5; $i * $i <= $liczba; $i += 6) 
    {
        if ($liczba % $i == 0 || $liczba % ($i + 2) == 0) return false;
    }
    return true;
}

function Wypisz_pierwsze($poczatek, $koniec) 
{
    echo "\n";
    for ($liczba = $poczatek; $liczba <= $koniec; $liczba++)
    {
        if (Czy_pierwsza($liczba)) echo $liczba . ", ";
    }
}


$pierwsza = 0;
$ostatnia = 100;
echo "Wypisuje liczby pierwsze od $pierwsza do $ostatnia: <pre>";

Wypisz_pierwsze($pierwsza, $ostatnia);
?>