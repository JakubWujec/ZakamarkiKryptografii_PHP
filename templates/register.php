<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zakamarki Kryptografii </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../static/index.css">
</head>
<body>

<div class="wrapper">
    <header class="main-header">
        <a href="index.php">
            Zakamarki Kryptografii
        </a>
    </header>

    <main>
        <p>
            Załóż konto <br>
            Wpisz swoje dane i założ zakamarkowe konto
        </p>

<?php

# connect with db
require_once('dbconn.php');


if(isset($_POST['submit'])){

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,
        DB_NAME) or die("ERROR: Could not connect with db." . mysqli_connect_error());
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($login) and !empty($password)) {
        $query_user_already_exist = "SELECT * FROM users WHERE login = '$login'";
        $data = mysqli_query($conn, $query_user_already_exist);

        if(mysqli_num_rows($data) == 0) {
            // login wolny
            $query = "INSERT INTO users VALUES (NULL,'$login', SHA('$password'))";
            mysqli_query($conn, $query);
            echo '<p>Udało się zarejestrować! Teraz możesz się zalogować! </p>';

            mysqli_close($conn);
            exit();
        } else {
            // login zajęty
            echo '<p>Login jest już zajęty </p>';
            $login='';
        }
    } else {
        echo 'Wypełnij wszystkie pola!';

    }
    mysqli_close($conn);
}


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
    <input type="submit" name="submit" value="Zarejestruj"/>
</form>

    </main>

</div> <!-- end wrapper -->

</body>
</html>

