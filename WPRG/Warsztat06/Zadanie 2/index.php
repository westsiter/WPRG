<?php
function ciagA($pierwszy_wyraz, $roznica, $n){
    if($roznica == 0)  echo "Blad! Roznica nie moze byc rowna 0";
    
    $suma_arytmetyczny = ((((2*$pierwszy_wyraz)+(($n*$roznica)-(1*$roznica)))/2)*$n)-$pierwszy_wyraz;

     echo" $suma_arytmetyczny";
     return;
}
function ciagB($pierwszy_wyraz, $roznica, $n){
    if($roznica == 1 || $roznica == 0 ) echo "Blad! roznica nie moze byc rowna 0 lub 1";

    $suma_geometryczny = ($pierwszy_wyraz*((1-($roznica**$n))/(1-$roznica)));

    echo "$suma_geometryczny";
}

$pierwszy_wyraz = 200;
$roznica = 9;
$n = 7;
echo "Suma ciagu arytmetycznego dla podanych danych:";
ciagA($pierwszy_wyraz, $roznica, $n);
echo "<pre>";
echo "Suma ciagu geometrycznego dla podanych danych: ";
ciagB($pierwszy_wyraz, $roznica, $n);
?>