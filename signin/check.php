<?php

session_start();

require_once '../database-config/database.php';

if(!isset($_SESSION['loggedId'])){

    if(isset($_POST['username'])){
    
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
    
        $userQuery = $db->prepare('SELECT userId, password FROM users WHERE username =:username');
        $userQuery->bindValue(':username', $username, PDO::PARAM_STR);
        $userQuery->execute();
    
        $user = $userQuery->fetch();
    
        if($user && password_verify($password, $user['password'])){
            $_SESSION['loggedId'] = $user['userId'];
            unset($_SESSION['badAttempt']);
        }else{
            $_SESSION['badAttempt'] = true;
            $_SESSION['tmpUsername'] = $username;
            header('Location: index.php');
            exit();
        }
    
    }else{
        $_SESSION['badAttempt'] = true;
        header('Location: index.php');
        exit();
    }

}else{
}


?>