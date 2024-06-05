<?php
$voted = isset($_COOKIE['voted']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$voted) {
    setcookie('voted', 'yes', time() + 3600 * 24 * 365);
    $voted = true;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sonda internetowa</title>
</head>
<body>
    <?php if ($voted): ?>
        <div>Już głosowałeś!</div>
    <?php else: ?>
        <form method="post">
            <h2>Jakie jest Twoje ulubione zwierzę?</h2>
            <input type="radio" name="animal" value="dog"> Pies<br>
            <input type="radio" name="animal" value="cat"> Kot<br>
            <input type="radio" name="animal" value="bird"> Ptak<br>
            <button type="submit">Głosuj</button>
        </form>
    <?php endif; ?>
</body>
</html>
