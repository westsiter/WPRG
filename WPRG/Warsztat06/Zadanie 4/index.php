<?php
function sumowanie($liczba) {
    while ($liczba >= 10)   $liczba = array_sum(str_split($liczba));
    echo "$liczba";

}

// Przykładowe użycie:
$liczba = 512;
echo "Suma cyfr liczby $liczba to: ";
sumowanie($liczba);
?>