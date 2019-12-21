<?php
require_once('startsession.php')
?>
<!DOCTYPE html>
<html lang="pl">
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

    <!-- for pseudocode
    <link rel="stylesheet" href="../tatetian-pseudocode.js-aae959a/static/pseudocode.css">
    <script src="../tatetian-pseudocode.js-aae959a/pseudocode.js"></script>
    -->

</head>

<body>
    <div class="top-menu">
        <?php
        require_once('top-menu.php');
        require_once('visitors_counter.php');
        ?>
    </div>
    <div class="wrapper">
        <header class="main-header">
            <a href="index.php">
            Zakamarki Kryptografii
            </a>
        </header>

        <main class="content article-content">
            <article id="goldwasser" >
                <h2 class="entry-title">Schemat Goldwasser-Micali szyfrowania probabilistycznego</h2>

                <img src="../images/password.jpg" alt="password lock">

                <div class="post-content">
                    <h3> Zanim zaczniemy </h3>

                    Na początku musimy zapoznać się z poniższymi definicjami.

                    <p> Niech $a \in \mathbb{Z}_{n}$. Mówimy, że $a$ jest <strong>reszta kwadratową</strong> modulo n
                    (kwadratem modulo n), jeżeli istnieje $ x \in \mathbb{Z}_{n}^{*} $ takie, że
                    $ x^{2} \equiv_p a  $

                        Jeżeli takie $x$ nie istnieje, to wówczas a nazywamy <strong>nieresztą kwadratową</strong>
                    modulo $n$. Zbiór wszystkich reszt kwadratowych modulo $n$ oznaczamy
                    $\mathbb{Q}_{n}$, zaś zbiór wszystkich niereszt kwadratowych modulo $n$ oznaczamy
                    $\overline {\mathbb{Q}_{n}}$
                    </p>

                    <p>
                        Przydałoby się zaznajomić także z symbolem Legendre'a i Jacobiego. Link
                        do artykułu opisującym te symbole <a href="jacoby.php">(tutaj)</a>
                    </p>

                    <h3>Algorytm generowania kluczy</h3>
                            <ol>
                                <li>Wybierz losowo dwie duze liczby pierwsze $p$ oraz $q$ (podobnego rozmiaru)</li>
                                <li>Policz $ n = pq $ </li>
                                <li>Wybierz $ y \in \mathbb{Z}_{n} $ takie, że y jest nieresztą kwadratową modulo
                    n i symbol Jacobiego $(\frac{y}{n}) = 1 $ (czyli $y$ jest pseudokwadratem modulo $n$)</li>
                                <li> Klucz publiczny stanowi para $(n,y)$, zaś odpowiadający mu klucz prywatny
                                to para $(p,q)$ </li>
                            </ol>

                    <h3>Algorytm szyfrowania</h3>

                            Chcąc zaszyfrować wiadomości przy użyciu klucza publicznego $(n, y)$
                            wykonaj kroki:
                            <ol>
                                <li>Przedstaw $m$ w postaci łańcucha binarnego $ m = m_1m_2 \dots m_t$ długości $t$</li>
                    <li>
                                    <p class = "pre"> Wykonaj
    For $i$ from $1$ to $t$ do
        wybierz losowe $ y \in \mathbb{Z}_{n}^{*} $
        If $m_i = 1$ then
            $ c_i \leftarrow yx^2\mod n$
        Otherwise
            $ c_i ← x^2 \mod n$
                                    </p> </li>
                                <li> Kryptogram wiadomości $m$ stanowi $c = (c_1, c_2, \dots , c_t)$ </li>
                            </ol>

                    <h3>Algorytm deszyfrowania</h3>
                    Chcąc odzyskać wiadomość z kryptogramu $c$ przy uzyciu klucza prywatnego
                    $(p, q)$ wykonaj kroki:
                    <ol>
                        <li>
                            <p class = "pre"> Wykonaj
    For $i$ from $1$ to $t$ do
        policz symbol Legendre'a
        $c_i = (\frac{c_i}{p}) $ (algorytm 3)
        If $e_i = 1$ then
           $m_i \leftarrow 0 $
        Otherwise
           $m_i ← 1 $
                            </p> </li>
                        <li> Zdeszyfrowana wiadomość to $m = m_1, m_2, \dots , m_t$ </li>
                    </ol>

                        <?php
                        $article='goldwasser';
                        require_once('commentary_section.php');
                        ?>
                    </div>
            </article>

        </main>

    </div> <!-- end wrapper -->

</body>


</html>
