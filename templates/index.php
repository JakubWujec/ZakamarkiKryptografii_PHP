<?php
session_start();

// Jeśli zmienne sesji nie są ustawione, skrypt próbuje użyć
// plików cookie.
require_once('startsession.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zakamarki Kryptografii </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../static/index.css">
    <!-- MATHJAX -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script type="text/javascript"
            id="MathJax-script"
            async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>
    <!-- for a dollar sign -->
    <script>
        window.MathJax = {
            tex: {
                inlineMath: [['$', '$'], ['\\(', '\\)']]
            }
        };
    </script>

</head>

<body>
    <div class="top-menu">
    <?php
        require_once('top-menu.php');
    ?>
    </div>

    <div class="wrapper">
        <header class="main-header">
            Zakamarki Kryptografii
        </header>

        <main class="content homepage-content">

            <div class="mini-article">
                <a href="./goldwasser.html">
                    <img src="../images/password.jpg" alt="password lock">
                </a>

                <a href="./goldwasser.html"> <h2 class="entry-title"> Algorytm szyfrowania probabilistycznego Goldwasser-Micali </h2> </a>
                <p class="post-content"> Jakiś wstęp do do dłuższego artykułu. Odkryli
                jak zrobić szyfrowanie. Zobacz jak! <a href="./goldwasser.html">(Więcej)</a>
                </p>
            </div>

            <div class="mini-article">
                <a href="./shamir.html">
                    <img src="../images/man.jpg" alt="man shh">
                </a>

                <a href="./shamir.html"> <h2 class="entry-title"> Dzielenie sekretu Shamira </h2> </a>
                <p class="post-content"> Schemat progowy dzielenia sekretu Shamira ze wzorem na interpolacji
                    Lagrange’a i przykładem policzonym ręcznie dla niedużych liczb <a href="./shamir.html">(Więcej)</a>
                </p>
            </div>

            <div class="mini-article">
                <a href="./jacoby.html">
                    <img src="../images/numbers.jpg" alt="password lock">
                </a>

                <a href="./jacoby.html"> <h2 class="entry-title"> Symbol Legendre’a i Jacobiego </h2> </a>
                <p class="post-content"> Symbole Legendre'a i Jacobiego oraz ich własności własności <a href="./jacoby.html">(Więcej)</a>
                </p>
            </div>

        </main>

    </div> <!-- end wrapper -->

</body>


</html>
