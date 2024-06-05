<?php
session_start();

$correct_login = "admin";
$correct_password = "password";

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] === $correct_login && $_POST['password'] === $correct_password) {
        $_SESSION['loggedin'] = true;
    } else {
        $error = "Błędny login lub hasło";
    }
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>
<body>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <p>Zalogowano pomyślnie</p>
        <form method="post">
            <button type="submit" name="logout">Wyloguj</button>
        </form>
    <?php else: ?>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <label>Login: <input type="text" name="login"></label><br>
            <label>Hasło: <input type="password" name="password"></label><br>
            <button type="submit">Zaloguj</button>
        </form>
    <?php endif; ?>
</body>
</html>
