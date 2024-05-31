<header>
    <div id="logo">
        <a href="index.html"><img src="./images/logoShop.png" width="150px" height="45px"></a>
    </div>
    <div id="navbar">
        <div id="leftNav">
            <a href="#">Nowe i polecane</a>
            <a href="#">Mężczyźni</a>
            <a href="#">Kobiety</a>
            <a href="#">Dzieci</a>

        </div>
        <div id="rightNav">
            <a href="#" class="log" onclick="openPU()"><i class='bx bx-user'></i>Zaloguj się</a>
            <a href="register.php" class="log"><i class='bx bx-edit'></i>Rejestracja</a>
        </div>
    </div>
</header>
<div id="container">
    <form id="login" method="POST" action="">
        <i class='bx bxs-user' id="iconLogin"></i>
        <i class='bx bx-x' id="closePU" onclick="closePopup()"></i>
        <div id="sLogin">
            <label id="email-label">E-mail</label>
            <input type="text" spellcheck="false" id="email-field" name="email" onkeyup="validateEmail()">
            <span id="email-error"></span>
        </div>
        <div id="sPassword">
            <label id="password-label">Hasło</label>
            <input type="password" spellcheck="false" name="password" id="password-field" placeholder=" ">
            <span id="password-error"></span>
        </div>
        <button id="enterLogin" name="login">Zaloguj się!</button>
    </form>
</div>

<script src="login.js"></script>