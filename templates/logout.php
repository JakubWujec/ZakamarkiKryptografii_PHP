<?php
session_start();
if(isset($_SESSION['user_id'])) {
    // usuwa wszystkie zmienne bieżącej sesji
    $_SESSION = array();
    // usuwa dane sesji z cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
    }
    // koniec sesji
    session_destroy();
}

setcookie('user_id', '', time() - 3600);
setcookie('user_login', '', time() - 3600);

$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);
?>
