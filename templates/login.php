<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zakamarki Kryptografii </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../static/index.css">
</head>
<body>

<?php

require_once ('startsession.php');
require_once('top-menu.php');

?>

<div class="wrapper">
    <header class="main-header">
        <a href="index.php">
            Zakamarki Kryptografii
        </a>
    </header>

    <main>

<?php


require_once('dbconn.php');
$error_msg = '';


// jeśli user nie jest zalogowany
if(!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        // łaczenie z baza
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,
            DB_NAME) or die("ERROR: Could not connect with db." . mysqli_connect_error());

        // pobieranie danych logowania
        $login = mysqli_real_escape_string($conn, $_POST['login']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // jeśli wypełnione pola
        if(!empty($login) and !empty($password)) {
            //wyszukiwanie loginu i hasla w bazie
            $query = "SELECT * FROM users WHERE login='$login' AND password=SHA('$password')";
            $data = mysqli_query($conn, $query);

            // jeśli jest jeden wynik
            if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_array($data);
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_login'] = $row['login'];
                setcookie('user_id', $row['id'], time() + 60*60 );
                setcookie('user_login', $row['login'], time() + 60*60 );
                // po udanym zalogowaniu skieruj na stronę główną
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .
                    '/index.php';
                header('Location: ' . $home_url);


            } else {
                $error_msg = 'Nieprawdiłowe dane byku.';
            }
        } else {
            $error_msg = 'Wypełnij wszystkie pola';
        }
    }
}

?>
        <p>
            Zaloguj się
        </p>

        <?php
            // jeśli nie usera w ciasteczkach
            if(empty($_COOKIE['user_id'])) {
                echo '<p class="error">' . $error_msg . '</p>';

        ?>

        <form class="auth-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label>
                <p>Login</p>
                <input type="text" name="login" id="login"
                       placeholder="Wpisz Login" maxlength="40" size="20"/>
            </label>
            <label>
                <p>Hasło</p>
                <input type="password" name="password" id="password"
                       placeholder="Wpisz hasło" maxlength="40" size="20"/>
            </label>
            <input type="submit" name="submit" value="Zaloguj"/>
        </form>

        <?php
            }
            else {
                //jeśli jest user w sesjii
                echo('<p> Jesteś zalogowany jako: ' . $_SESSION['user_login'] . '</p>');

            }
        ?>

    </main>

</div> <!-- end wrapper -->

</body>
</html>


