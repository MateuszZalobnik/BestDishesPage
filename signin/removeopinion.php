<?php 
session_start();

if(isset($_POST['opinionId'])){
    require_once '../database-config/database.php';

    $query = $db->prepare('DELETE FROM opinions WHERE opinionId='.$_POST['opinionId']);
    $query->execute();
    
    $query = $db->prepare('DELETE FROM rating WHERE ratingId='.$_POST['opinionId']);
    $query->execute();

    $_SESSION['removeInfo'] = '<br><span style="color:red; background-color:white;">Usunąłęś opinię.</span>';


}else{

}

header('Location: myaccount.php');

?>