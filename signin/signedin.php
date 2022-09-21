<?php

require_once 'check.php';

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLE -->
    <link rel="stylesheet" href="../css/signedin.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

    <title>Your Best Dishes</title>
</head>

<body>
    <header class="header">
        <div class="header__leftSide">
            <a href="index.php">
                <div class="header__logo">
                    <img class="header__logoImage" src="../img/logo_photo.png" alt="logo">
                    <div class="header__title">
                        <h1>Dishes4You</h1>
                    </div>
                </div>
            </a>
            <div class="header__subtitle">Znajdź najlepsze jedzenie w Twojej okolicy</div>
        </div>

        <div class="header__rightSide">
            <nav class="header__menu">
                <ul>
                    <li><a href="signedin.php" class="header__menu--active">HOME</a></li>
                    <li><a href="myaccount.php">MOJE KONTO</a></li>
                    <li><a href="logout.php">WYLOGUJ</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <section class="banner">
        <img class="banner__image" src="../img/banner1.jpg" alt="">
        <span class="banner__leftArrow">&lt;</span>
        <span class="banner__rightArrow">&gt;</span>
        <ul class="banner__dots">
            <li class="banner__dot"><button class="banner__btn--1 banner__btn--active"></button></li>
            <li class="banner__dot"><button class="banner__btn--2"></button></li>
            <li class="banner__dot"><button class="banner__btn--3"></button></li>
        </ul>
    </section>

    <main class="mainContent">
        
    <form class="mainContent__form" action="" method="get">
            <select name="filter">
                <option value="" selected>wybierz</option>
                <option value="dateUp" >data&uarr;</option>
                <option value="dateDown" >data&darr;</option>
                <option value="priceUp" >cena&uarr;</option>
                <option value="priceDown" >cena&darr;</option>
                
            </select>

            <input type="submit" value="filtruj">
        </form>

        <?php
        $_SESSION['imgPath'] = '../';
        require_once '../database-config/list.php';
        
        ?>

    </main>

    <footer class="footer">
        <div class="footer__logo">
            <img class="footer__logoImage" src="../img/logo_photo.png" alt="logo">
            <div class="footer__title">Dishes4You</div>
        </div>

        <div class="footer__block">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#">about us</a></li>
                <li><a href="#">system of rating</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">privacy policy</a></li>
            </ul>
        </div>
        <div class="footer__block">
            <h2>Socials</h2>

            <ul>
                <li><a href="#">facebook</a></li>
                <li><a href="#">instagram</a></li>
                <li><a href="#">youtube</a></li>
                <li><a href="#">twitter</a></li>
            </ul>
        </div>
    </footer>

    <script src="../js/bannersignedin.js"></script>
</body>

</html>