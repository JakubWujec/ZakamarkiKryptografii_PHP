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

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    // last request was more than 30 minutes ago
    //session_unset();     // unset $_SESSION variable for the run-time
    //session_destroy();   // destroy session data in storage
    require_once('logout.php');
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
