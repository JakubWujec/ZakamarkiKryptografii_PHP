<?php
require_once('dbconn.php');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,
    DB_NAME) or die("ERROR: Could not connect with db." . mysqli_connect_error());

$date = date("Y-m-d");
$user_ip = $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM visitors WHERE ip = '$user_ip'";
$result = mysqli_query($conn, $query);

// pierwszy raz usera
if(mysqli_num_rows($result) == 0){
    $query = "INSERT INTO visitors VALUES('$user_ip','$date',1)";
    mysqli_query($conn, $query);

    // był wcześniej
} else {
    $row = mysqli_fetch_array($result);
    $last_date = $row['last_visit_date'];

    if(!($last_date == $date)){
        $query = "UPDATE visitors SET last_visit_date = '$date', counter=counter+1 WHERE ip='$user_ip'";
        mysqli_query($conn, $query);
    }
}

$query = "SELECT SUM(counter) as 'visits' FROM visitors";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
echo('<br><p>Odwiedzin: ' . $row['visits'] . ' ');

mysqli_close($conn);
