<?php
session_start();

if(isset($_SESSION['loggedId'])){
    header('Location: signin/signedin.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLE -->
    <link rel="stylesheet" href="css/main.css">
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
                    <img class="header__logoImage" src="img/logo_photo.png" alt="logo">
                    <div class="header__title">
                        <h1>Dishes4You</h1>
                    </div>
                </div>
            </a>
            
            <div class="header__subtitle">Znajdź najlepsze jedzenie w Twojej okolicy</div>
        </div>

        <div class="header__rightSide">
            <nav class="header__menu">
                <a href="signin/index.php">Zaloguj się</a>
            </nav>
        </div>

    </header>

    <section class="banner">
        <img class="banner__image" src="img/banner1.jpg" alt="">
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
        require_once 'database-config/list.php';
        ?>
<!--  
        <section class="proposal">

            <img src="img/food_category/pizza.png" alt="" class="proposal__img">

            <div class="proposal__block">
                <h3 class="proposal__name">Pizza Americana</h3>
                <span class="proposal__price">Price: 30zł</span>

            </div>

            <div class="proposal__block">
                <h4 class="proposal__restaurant">pizzeria na rynku</h4>
                <h4 class="proposal__restaurant">Wrocław, Rynek 14</h4>
            </div>

            <div class="proposal-rating">
                <span>flavour: 5/10</span>
                <span>service: 8/10</span>
                <span>price: 4/10</span>
            </div>
            <div class="proposal__user">
                <span>user: Ziomek</span>
                <span>intermediate</span>
                <span>14-5-2022</span>
            </div>

        </section>

        <section class="proposal">

            <img src="img/food_category/burger.png" alt="" class="proposal__img">

            <div class="proposal__block">
                <h3 class="proposal__name">Pizza Americana</h3>
                <span class="proposal__price">Price: 30zł</span>

            </div>

            <div class="proposal__block">
                <h4 class="proposal__restaurant">pizzeria na rynku</h4>
                <h4 class="proposal__restaurant">Wrocław, Rynek 14</h4>
            </div>

            <div class="proposal-rating">
                <span>flavour: 5/10</span>
                <span>service: 8/10</span>
                <span>price: 4/10</span>
            </div>
            <div class="proposal__user">
                <span>user: Ziomek</span>
                <span>intermediate</span>
                <span>14-5-2022</span>
            </div>

        </section>  -->

    </main>

    <footer class="footer">
        <div class="footer__logo">
            <img class="footer__logoImage" src="img/logo_photo.png" alt="logo">
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

    <script src="js/banner.js"></script>
</body>

</html>