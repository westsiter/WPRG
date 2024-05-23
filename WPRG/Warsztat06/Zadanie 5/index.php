<?php
function isPangram($text) {
    // Normalizacja tekstu - zamiana na małe litery
    $text = strtolower($text);
    
    // Inicjalizacja tablicy pomocniczej do przechowywania wystąpień liter
    $letters = array_fill(0, 26, false);
    
    // Iteracja przez każdy znak tekstu
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        // Sprawdzenie czy znak jest literą
        if (ctype_alpha($char)) {
            // Indeks litery w alfabecie
            $index = ord($char) - ord('a');
            // Ustawienie odpowiedniego elementu tablicy na true
            $letters[$index] = true;
        }
    }
    
    // Sprawdzenie czy wszystkie litery występują
    foreach ($letters as $value) {
        if (!$value) {
            return false; // Brak wystąpienia co najmniej jednej litery
        }
    }
    return true; // Wszystkie litery występują
}

// Przykładowe użycie:
$text = "Pack my box with five dozen liquor jugs";
$result = isPangram($text);
if ($result) {
    echo "true";
} else {
    echo "false";
}
?>