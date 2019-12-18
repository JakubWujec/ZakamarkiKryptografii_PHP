<?php

//generowanie menu
if (isset($_SESSION['user_login'])) {
    echo('Witaj ' . $_SESSION['user_login'] . ' ');
    echo '<a href="logout.php">Wyloguj się</a>';
} else {
    echo '<a href="login.php">Zaloguj się</a>';
    echo '<a href="register.php">Zarejestruj się</a>';
}

?>
