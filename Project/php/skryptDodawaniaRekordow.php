<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Produkt</title>
</head>
<body>
    <h1>Dodaj Nowy Produkt</h1>
    <form action="skryptDodawaniaRekordow.php" method="post" enctype="multipart/form-data">
        <label for="nazwa">Nazwa:</label><br>
        <input type="text" id="nazwa" name="nazwa" required><br><br>
        
        <label for="cena">Cena:</label><br>
        <input type="number" id="cena" name="cena" step="0.01" required><br><br>
        
        <label for="kolor">Kolor:</label><br>
        <input type="text" id="kolor" name="kolor" required><br><br>
        
        <label for="kategoria">Kategoria:</label><br>
        <select id="kategoria" name="kategoria" required>
            <option value="">Wybierz kategorię</option>
            <option value="buty">Buty</option>
            <option value="spodnie">Spodnie</option>
            <option value="koszulki">Koszulki</option>
            <option value="bluzy">Bluzy</option>
        </select><br><br>
        <label for="plec">plec:</label><br>
        <select id="plec" name="plec" required>
            <option value="">Wybierz plec</option>
            <option value="meskie">meskie</option>
            <option value="damskie">damskie</option>
            <option value="dzieci">dzieci</option>
        </select><br><br>
        
        <label for="rozmiar">Rozmiar:</label><br>
        <input type="text" id="rozmiar" name="rozmiar" required><br><br>
        
        
        <label for="opis">Opis:</label><br>
        <textarea id="opis" name="opis" required></textarea><br><br>
        
        <label for="zdjecie">Zdjęcie:</label><br>
        <input type="file" id="zdjecie" name="zdjecie" accept="image/*" required><br><br>
        
        <input type="submit" value="Dodaj Produkt">
    </form>
</body>
</html>
    <?php include('dbconection.php'); ?>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sprawdzanie istnienia i przypisywanie zmiennych
    $nazwa = isset($_POST['nazwa']) ? $_POST['nazwa'] : '';
    $cena = isset($_POST['cena']) ? $_POST['cena'] : '';
    $kolor = isset($_POST['kolor']) ? $_POST['kolor'] : '';
    $kategoria = isset($_POST['kategoria']) ? $_POST['kategoria'] : '';
    $rozmiar = isset($_POST['rozmiar']) ? $_POST['rozmiar'] : '';
    $opis = isset($_POST['opis']) ? $_POST['opis'] : '';
    $plec = isset($_POST['plec']) ? $_POST['plec'] : '';
    
    // Sprawdzanie istnienia pliku
    if (isset($_FILES['zdjecie']) && $_FILES['zdjecie']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["zdjecie"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Sprawdź, czy plik jest obrazem
        $check = getimagesize($_FILES["zdjecie"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Plik nie jest obrazem.";
            $uploadOk = 0;
        }

        // Sprawdź, czy plik już istnieje
        if (file_exists($target_file)) {
            echo "Plik już istnieje.";
            $uploadOk = 0;
        }

        // Sprawdź rozmiar pliku
        if ($_FILES["zdjecie"]["size"] > 5000000) {
            echo "Plik jest za duży.";
            $uploadOk = 0;
        }

        // Ogranicz formaty plików
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Dozwolone są tylko formaty JPG, JPEG, PNG i GIF.";
            $uploadOk = 0;
        }

        // Sprawdź, czy $uploadOk jest ustawione na 0 przez błąd
        if ($uploadOk == 0) {
            echo "Przepraszamy, plik nie został przesłany.";
        // Jeśli wszystko jest w porządku, spróbuj przesłać plik
        } else {
            if (move_uploaded_file($_FILES["zdjecie"]["tmp_name"], $target_file)) {
                echo "Plik ". basename($_FILES["zdjecie"]["name"]). " został przesłany.";
                
                // Dodawanie danych do bazy
                $sql = "INSERT INTO produkty (nazwa, kolor, opis, kategoria, cena, rozmiar, plec ,zdjecie) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssssisss", $nazwa, $kolor, $opis, $kategoria, $cena, $rozmiar, $plec, $target_file);

                if ($stmt->execute()) {
                    echo "Nowy rekord został dodany pomyślnie.";
                } else {
                    echo "Błąd: " . $sql . "<br>" . $con->error;
                }

                $stmt->close();
            } else {
                echo "Przepraszamy, wystąpił błąd podczas przesyłania pliku.";
            }
        }
    } else {
        echo "Brak pliku do przesłania.";
    }
}

$con->close();
?>