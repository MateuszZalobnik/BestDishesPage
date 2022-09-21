<?php
session_start();

if(isset($_SESSION['loggedId'])){
   header('Location: signedin.php');
    exit();
}

if(isset($_POST['email'])){
    $confirmed = true; 

    //username check length >3 && <=20
    $username = $_POST['username'];
    if(strlen($username)<3 || strlen($username)>=20){
        $confirmed = false;
        $_SESSION['usernameError'] = '<span style="color:red">Login musi posiadać od 3 do 20 znaków!</span><br>';
    }   

    if(ctype_alnum($username) == false){
        $_SESSION['usernameError'] = '<span style="color:red">Login może składać się tylko z liter i cyfr (bez polskich znaków)!</span><br>';
    }

    require_once '../database-config/database.php';

    $usernameQuery = $db->prepare('SELECT userId FROM users WHERE username =:username');
    $usernameQuery->bindValue(':username', $username, PDO::PARAM_STR);
    $usernameQuery->execute();
    
    if($usernameQuery->rowCount() > 0){
        $confirmed=false;
        $_SESSION['usernameError'] = '<span style="color:red">Istnieje już taki login!</span><br>';
    }

    //email check

    $email = $_POST['email'];

    $emailSanitize = filter_var($email, FILTER_SANITIZE_EMAIL);

    if((filter_var($emailSanitize, FILTER_VALIDATE_EMAIL)==false) || ($email!=$emailSanitize)){
        $confirmed=false;
        $_SESSION['emailError'] = '<span style="color:red">Podaj poprawny email!</span><br>';
    }


    $email = filter_input(INPUT_POST, 'email');

    $emailQuery = $db->prepare('SELECT userId FROM users WHERE email =:email');
    $emailQuery->bindValue(':email', $email, PDO::PARAM_STR);
    $emailQuery->execute();
    
    if($emailQuery->rowCount() > 0){
        $confirmed=false;
        $_SESSION['emailError'] = '<span style="color:red">Istnieje już taki email! <a href="index.php">Zaloguj się</a></span><br>';
    }
    

    //password check length >=8 && <=20
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if(strlen($password)<=8 || strlen($password)>20){
        $confirmed = false;
        $_SESSION['passwordError'] = '<span style="color:red">Hasło musi posiadać od 8 do 20 znaków</span><br>';
    }
    if($password!=$passwordConfirm){        
        $confirmed = false;
        $_SESSION['passwordError'] = '<span style="color:red">Podane hasła nie są identyczne!</span><br>';
    }
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    //rules check
    if(!isset($_POST['rules'])){
        $confirmed = false;
        $_SESSION['rulesError'] = '<span style="color:red">Zaakceptuj regulamin!</span><br>';
    }

    if($confirmed==true){
        $query = $db->prepare('INSERT INTO users VALUES (NULL, :username, :email, :password)');
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password_hash, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['registration']=true;
        header('Location: index.php');
    }

    $_SESSION['tmpEmail'] = $email;
    $_SESSION['tmpUsername'] = $username;
    $_SESSION['tmpPassword'] = $password;
    $_SESSION['tmpPasswordConfirm'] = $passwordConfirm;
    if(isset($_POST['rules'])) $_SESSION['tmpRules']=true;
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- STYLE -->
     <link rel="stylesheet" href="../css/registration.css"> 
     <!-- FONTS -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

    <title>Your Best Dishes - zarejestruj się</title>
</head>
<body>
    <main class="registration">
        <div class="registration__header">
            <a href="../">
            <img class="registration__logoImage" src="../img/logo_photo.png" alt="logo">
                <div class="registration__title">
                <span>Dishes4You</span>
                </div>

            </a>
            
                <h1>Zarejestruj się</h1>
        </div>

        <form class="registration__form" action="" method="post">
            <label>E-mail <br><input type="email" name="email" <?= isset($_SESSION['tmpEmail']) ? 'value="'.$_SESSION['tmpEmail'].'"' : 'value=""'?>></label> <br>
            <?php
                if(isset($_SESSION['emailError'])){
                    echo $_SESSION['emailError'];
                }
            ?>  
            <label>Login <br><input type="text" name="username" <?= isset($_SESSION['tmpUsername']) ? 'value="'.$_SESSION['tmpUsername'].'"' : 'value=""'?>></label> <br>
            <?php
                if(isset($_SESSION['usernameError'])){
                    echo $_SESSION['usernameError'];
                }
            ?>    
            <label>Hasło <br><input type="password" name="password" <?= isset($_SESSION['tmpPassword']) ? 'value="'.$_SESSION['tmpPassword'].'"' : 'value=""'?>></label> <br> 
            <label>Powtórz hasło <br><input type="password" name="passwordConfirm" <?= isset($_SESSION['tmpPasswordConfirm']) ? 'value="'.$_SESSION['tmpPasswordConfirm'].'"' : 'value=""'?>></label> <br>
            <?php
                if(isset($_SESSION['passwordError'])){
                    echo $_SESSION['passwordError'];
                }
            ?> 
            <label><input type="checkbox" name="rules" <?= isset($_SESSION['tmpRules']) ? 'checked' : ''?>> Akceptuję regulamin</label> <br>
            <?php
                if(isset($_SESSION['rulesError'])){
                    echo $_SESSION['rulesError'];
                }
            ?> 
            <input class="registration__btn" type="submit" value="Zarejestruj się"> 

            <?php
                unset($_SESSION['emailError']);
                unset($_SESSION['usernameError']);
                unset($_SESSION['passwordError']);
                unset($_SESSION['rulesError']);
                unset($_SESSION['tmpEmail']);
                unset($_SESSION['tmpUsername']);
                unset($_SESSION['tmpPassword']);
                unset($_SESSION['tmpPasswordConfirm']); 
                unset($_SESSION['tmpRules']); 

            ?>
        </form>


    </main>
    
</body>
</html>