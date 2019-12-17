<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Odbieranie formularza</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <style> td,th {border: blue solid 1px;} </style>
</head>

<body>
<h2>Zmienne przekazane metodą GET</h2>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
reset($_GET);
while( list( $nazwa, $wartosc ) = each( $_GET ) )
  echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n"; ?>
</table>

<hr />

<h2>Zmienne przekazane metodą POST</h2>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
reset($_POST);
while( list( $nazwa, $wartosc ) = each( $_POST ) )
  echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n";
?>
</table>

<hr />

<h2>Zmienne serwera</h2>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
reset($_SERVER);
while( list( $nazwa, $wartosc ) = each( $_SERVER ) )
  echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n";
?>
</table>

<hr />

<h2>Zmienne środowiskowe (globalne)</h2>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
reset($_ENV);
while( list( $nazwa, $wartosc ) = each( $_ENV ) )
  echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n";
?>
</table>

<hr />

<h2>Ciasteczka</h2>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
reset($_COOKIE);
while( list( $nazwa, $wartosc ) = each( $_COOKIE ) )
  echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n";
?>
</table>

<hr />

<h2>Sesja</h2>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
if( isset($_SESSION) ) {
reset($_SESSION);
while( list( $nazwa, $wartosc ) = each( $_SESSION ) )
  echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n";
}
?>
</table>

<hr />

<h2>Pliki</h2>
<table>
<tr><th>Nazwa</th><th>Wartość</th></tr>
<?php
reset($_FILES);
while( list( $nazwa, $wartosc ) = each( $_FILES ) )
  echo "<tr><td>".$nazwa."</td><td>".$wartosc."</td></tr>\n";
?>
</table>

</body>
</html>
