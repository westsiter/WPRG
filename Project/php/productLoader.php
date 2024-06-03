<?php
include('../php/dbconection.php');

$offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;

$sql = "SELECT nazwa, cena, zdjecie, rozmiar, opis, ilosc FROM produkty ORDER BY id DESC LIMIT 1 OFFSET ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $offset);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div id='productCard'>";
            echo "<div id='productLeft'>";
                echo "<img src='" . $row['zdjecie'] . "' alt='" . $row['nazwa'] . "'id='productPhoto'>";
            echo "</div>";
                echo "<div id='productRight'>";
                    echo "<p id='nameProduct'>" . $row['nazwa'] . "</p>";
                    echo "<p id='descriptionProduct'>" . $row['opis'] . "</p>";
                    echo "<p id='sizeProduct'>Rozmiar: " . $row['rozmiar'] . "</p>";
                    echo "<p id='countProduct'>Ilość: " . $row['ilosc'] . "</p>";
                    echo "<p id='costProduct'>Cena: " . $row['cena'] . "zł</p>";
                    echo "<button><i class='bx bx-cart-add'></i>Dodaj</button>";
                echo "</div>";
        echo "</div>";
    }
} else {
    echo "Brak kolejnych rekordów do wyświetlenia.";
}

$stmt->close();
$con->close();
?>
