<?php session_start();

$filename = 'users.txt';

function register_user($firstname, $lastname, $email, $password) {
    global $filename;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Niepoprawny adres email.";
    }
    if (strlen($password) < 6 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[^a-zA-Z\d]/', $password)) {
        return "Hasło nie spełnia wymagań.";
    }
    $users = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($storedEmail) = explode('|', $user);
        if ($storedEmail == $email) {
            return "Email jest już zarejestrowany.";
        }
    }
    $file = fopen($filename, 'a');
    fwrite($file, "$email|$password|$firstname|$lastname\n");
    fclose($file);
    return "Rejestracja zakończona sukcesem.";
}

function login_user($email, $password) {
    global $filename;
    $users = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($storedEmail, $storedPassword) = explode('|', $user);
        if ($storedEmail == $email && $storedPassword == $password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $email;
            return true;
        }
    }
    return false;
}

if (isset($_POST['register'])) {
    $message = register_user($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
}

if (isset($_POST['login'])) {
    if (login_user($_POST['email'], $_POST['password'])) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $login_error = "Błędny login lub hasło.";
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja i Logowanie</title>
</head>
<body>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo "<p>Witaj, " . htmlspecialchars($_SESSION['user']) . "!</p>";
    echo "<form method='post'><button name='logout'>Wyloguj</button></form>";
} else {
    if (isset($login_error)) {
        echo "<p>$login_error</p>";
    }
    if (isset($message)) {
        echo "<p>$message</p>";
    }
?>
    <h2>Rejestracja</h2>
    <form method="post">
        <label>Imię: <input type="text" name="firstname" required></label><br>
        <label>Nazwisko: <input type="text" name="lastname" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Hasło: <input type="password" name="password" required></label><br>
        <button type="submit" name="register">Zarejestruj</button>
    </form>

    <h2>Logowanie</h2>
    <form method="post">
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Hasło: <input type="password" name="password" required></label><br>
        <button type="submit" name="login">Zaloguj</button>
    </form>
<?php
}
?>
</body>
</html>
