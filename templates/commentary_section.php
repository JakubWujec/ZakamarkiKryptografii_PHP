
<div class="commentary-section">
<?php
require_once('dbconn.php');

// jeśli user jest zalogowany
if(isset($_SESSION['user_id'])) {
# connect with db

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,
    DB_NAME) or die("ERROR: Could not connect with db." . mysqli_connect_error());
if (isset($_POST['submit']) ) {
        // sprawdz czy był post akurat od tej sekcji komentarzy ktorej chcemy
        if(!empty($_POST[$article])){
            $comment = mysqli_real_escape_string($conn, $_POST[$article]);

            $datetime = date("Y-m-d H:i:s");
            if (!empty($comment)) {
                $user_login = $_SESSION['user_id'];
                $get_login_query = "SELECT * FROM users WHERE id=$user_login";
                $result = mysqli_query($conn, $get_login_query);
                $row = mysqli_fetch_array($result);
                $user_login = $row['login'];

                $insert_query = "INSERT INTO commentaries VALUES(NULL,'$user_login', '$article', '$comment','$datetime')";
                mysqli_query($conn, $insert_query);
            } else {
                echo 'Wypełnij wszystkie pola!';
            }
        }

}

echo("<h2>Komentarze: </h2>");
$get_comments_query = "SELECT * FROM commentaries WHERE article='$article'";
$result = mysqli_query($conn, $get_comments_query);
while ($row = mysqli_fetch_array($result)) {
    echo('[' . $row['user_login'] . '] ' . $row['comment_text'] . '<br>');
}


mysqli_close($conn);

?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
        <label>
            <p>Zadaj pytanie / Dodaj komentarz </p>
            <textarea name="<?php echo $article ?>" cols="40" rows="5"></textarea>
        </label>
        <input type="submit" name="submit" value="Wyślij"/>
    </form>


<?php
// jeśli nie jest zalogowany
    } else{
    echo("<p>Komentarze dostępne tylko dla zalogowanych</p>");
}
?>
</div>

