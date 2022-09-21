<?php

session_start();

if(isset($_POST['dishName'])){
    $dishName = filter_input(INPUT_POST, 'dishName');
    $dishCategory = filter_input(INPUT_POST, 'dishCategory');
    $price = filter_input(INPUT_POST, 'price');
    $restaurantName = filter_input(INPUT_POST, 'restaurantName');
 if($_POST['restaurantAdress'] != ''){
     $restaurantAdress = filter_input(INPUT_POST, 'restaurantAdress');
 }else{
     $restaurantAdress = 'Brak danych';
 }
 $flavour = filter_input(INPUT_POST, 'flavour');
 $service = filter_input(INPUT_POST, 'service');
 $priceRating = filter_input(INPUT_POST, 'priceRating');

 require_once '../database-config/database.php';



 $query = $db->prepare('INSERT INTO opinions VALUES (NULL, :dishName, :dishCategory, :price, :userId, :restaurantName, :restaurantAdress, CURRENT_TIMESTAMP())');
$query->bindValue(':dishName', $dishName, PDO::PARAM_STR);
$query->bindValue(':dishCategory', $dishCategory, PDO::PARAM_STR);
$query->bindValue(':price', $price, PDO::PARAM_STR);
$query->bindValue(':userId', $_SESSION['loggedId'], PDO::PARAM_STR);
$query->bindValue(':restaurantName', $restaurantName, PDO::PARAM_STR);
$query->bindValue(':restaurantAdress', $restaurantAdress, PDO::PARAM_STR);
$query->execute();

 $query = $db->prepare('INSERT INTO rating VALUES (NULL, :flavour, :service, :price)');
$query->bindValue(':flavour', $flavour, PDO::PARAM_STR);
$query->bindValue(':service', $service, PDO::PARAM_STR);
$query->bindValue(':price', $priceRating, PDO::PARAM_STR);
$query->execute();


 }

 header('Location: myaccount.php');

?>
