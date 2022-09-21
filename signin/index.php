<?php
session_start();

if(isset($_SESSION['loggedId'])){
   header('Location: signedin.php');
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
     <link rel="stylesheet" href="../css/signin.css">
     <!-- FONTS -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

    <title>Your Best Dishes - zaloguj się</title>
</head>
<body>
    <main class="signin">
        <div class="signin__header">
            <a href="../">
            <img class="signin__logoImage" src="../img/logo_photo.png" alt="logo">
                <div class="signin__title">
                <span>Dishes4You</span>
                </div>

            </a>
            <?php
                if(isset($_SESSION['registration'])){
                    echo '<span>Udało się założyć konto!</span><br>';
                    unset($_SESSION['registration']);
                }
            ?>
                <h1>Zaloguj się</h1>
        </div>

        <form class="signin__form" action="signedin.php" method="post">
            <label>Login <br><input type="text" name="username" <?= isset($_SESSION['tmpUsername']) ? 'value="'.$_SESSION['tmpUsername'].'"' : 'value=""'?>></label> <br>  
            <label>Hasło <br><input type="password" name="password" ></label> <br>
            <input class="signin__btn" type="submit" value="Zaloguj"> 
            <?php
                if(isset($_SESSION['badAttempt'])){
                    echo '<span style="color:red"><br>Niepoprawny login lub hasło!</span>';
                    unset($_SESSION['badAttempt']);
                    unset($_SESSION['tmpUsername']);
                }
            ?> 
        </form>

        <span>Nie masz jeszcze konta? <a href="registration.php">Zarejestruj się</a></span>

    </main>
    
</body>
</html>