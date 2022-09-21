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
    <link rel="stylesheet" href="../css/myaccount.css">
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
                    <li><a href="signedin.php" >HOME</a></li>
                    <li><a href="myaccount.php" class="header__menu--active">MOJE KONTO</a></li>
                    <li><a href="logout.php">WYLOGUJ</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <section class="addOpinion">
        <form class="addOpinion__form" action="addopinion.php" method="post">
        <div class="addOpinion__exitBtn">X</div>
            <span class="addOpinion__title">Dodaj opinię:</span><br>
            <label>Nazwa dania: <input type="text" name="dishName" required></label>
            <label>Kategoria: <select name="dishCategory" required>
                    <option value="pizza">Pizza</option>
                    <option value="doner">Doner</option>
                    <option value="burger">Burger</option>
                    <option value="others">Others</option>
                </select></label>
            <label>Cena:<input type="number" step="0.01" name="price" required></label>
            <label>Nazwa restauracji: <input type="text" name="restaurantName" required></label>
            <label>Adres restauracji: <input type="text" name="restaurantAdress"></label>
            <div class="addOpinion__ratingWrapper">
                <div class="addOpinion__rating sliderFlavour"><label>smak:<span class="flavourRating">5</span><br><input type="range" min="1" max="10" value="5"
                            name="flavour" required></label></div>
                <div class="addOpinion__rating sliderService"><label>obsługa:<span class="serviceRating">5</span><br><input type="range" min="1" max="10" value="5"
                            name="service" required></label></div>
                <div class="addOpinion__rating sliderPrice"><label>cena:<span class="priceRating">5</span><br><input type="range" min="1" max="10" value="5"
                            name="priceRating" required></label></div>

            </div>
            <input class="addOpinion__submit" type="submit" value="Dodaj">

        </form>
    </section>

    <main class="mainContent">
        <button class="addOpinionBtn">Dodaj opinie</button>
        <h2>Twoje opinie:</h2>


        <?php

        if(isset($_SESSION['removeInfo'])){
            echo $_SESSION['removeInfo'];

            unset($_SESSION['removeInfo']);
        }

        require_once 'userlist.php';
        
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


    <script src="../js/addopinion.js"></script>
</body>

</html>