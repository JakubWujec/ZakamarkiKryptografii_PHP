<?php

require_once "wyswietl2-funkcje.php";

?>
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

<?php tabelka($_GET); ?>

<hr />

<h2>Zmienne przekazane metodą POST</h2>

<?php tabelka($_POST); ?>

<hr />

<h2>Zmienne serwera</h2>

<?php tabelka($_SERVER); ?>

<hr />

<h2>Zmienne środowiskowe (globalne)</h2>

<?php tabelka($_ENV); ?>

<hr />

<h2>Ciasteczka</h2>

<?php tabelka($_COOKIE); ?>

<hr />

<h2>Sesja</h2>

<?php tabelka($_SESSION); ?>

<hr />

<h2>Pliki</h2>

<?php tabelka($_FILES); ?>

</body>
</html>
