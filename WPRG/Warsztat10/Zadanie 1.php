<?php
if (isset($_COOKIE['visitCount'])) {
    $visitCount = $_COOKIE['visitCount'] + 1;
} else {
    $visitCount = 1;
}
setcookie('visitCount', $visitCount, time() + 3600 * 24 * 365);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Licznik odwiedzin</title>
</head>
<body>
    <div>Liczba odwiedzin: <?php echo $visitCount; ?></div>
    <form method="post" action="reset.php">
        <button type="submit">Resetuj licznik</button>
    </form>
</body>
</html>