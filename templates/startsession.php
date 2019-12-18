<?php

// rozpocznij sesje
if(!isset($_SESSION)){
    session_start();
}

// Jeśli zmienne sesji nie są ustawione, skrypt próbuje użyć
// plików cookie.
if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_login'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['user_login'] = $_COOKIE['user_login'];
    }
}
?>
