<?php

require_once '../database-config/database.php';


$opinionsQuery = $db->query('SELECT * FROM opinions WHERE userId ='.$_SESSION['loggedId'].' ORDER BY date DESC');

if($opinionsQuery->rowCount()>0){


    $opinions = $opinionsQuery->fetchAll();


    foreach ($opinions as $opinion){
    
        $ratingQuery = $db->query('SELECT * FROM rating WHERE ratingId='.$opinion['opinionId']);
        $rating = $ratingQuery->fetchAll();
    
        $userQuery = $db->query('SELECT username FROM users WHERE userId='.$opinion['userId']);
        $user = $userQuery->fetchAll();
    
        $levelQuery = $db->query('SELECT COUNT(opinionId) FROM opinions WHERE userId='.$opinion['userId']);
        $level = $levelQuery->fetchAll();
        $levelStr = '';
    
        if($level[0][0]<5){
            $levelStr='początkujący';
        }elseif($level[0][0]<10){
            $levelStr='średniozaawansowany';
        }else{
            $levelStr='zaawansowany';
        }    
    
        isset($_SESSION['imgPath'])? : $_SESSION['imgPath']='';
    
        $textHTML='';
        $textHTML.='<section class="opinion">';
        $textHTML.= '<img src="'.$_SESSION['imgPath'].'../img/food_category/'.$opinion['dishCategory'].'.png" alt="'.$opinion['dishCategory'].'" class="opinion__img">';
        $textHTML.= '<div class="opinion__block">';
        $textHTML.= '<h3 class="opinion__name">'.$opinion['dishName'].'</h3>';
        $textHTML.= '<span class="opinion__price">Price: '.$opinion['price'].'zł</span>';
        $textHTML.= '</div>';
        $textHTML.= '<div class="opinion__block">';
        $textHTML.= '<h4 class="opinion__restaurant">'.$opinion['restaurantName'].'</h4>';
        $textHTML.= '<h4 class="opinion__restaurant">'.$opinion['restaurantAdress'].'</h4>';
        $textHTML.= '</div>';
        $textHTML.= '<div class="opinion-rating">';
        $textHTML.= '<span>flavour: '.$rating[0]['flavour'].'/10</span>';
        $textHTML.= '<span>service: '.$rating[0]['service'].'/10</span>';
        $textHTML.= '<span>price: '.$rating[0]['price'].'/10</span>';
        $textHTML.= '</div>';
        $textHTML.= '<div class="opinion__user">';
        $textHTML.= '<span>user: '.$user[0]['username'].'</span>';
        $textHTML.= ' <span>'.$levelStr.'</span>';
        $textHTML.= '<span>'.substr($opinion['date'], 0, 10).'</span>';
        $textHTML.= '</div>';
        $textHTML.= '<div class="opinion__buttons">';
        $textHTML.= '<form action="removeopinion.php" method="post">';
        $textHTML.= '<input style="display:none;" name="opinionId" type="number" value="'.$opinion['opinionId'].'" />';
        $textHTML.= '<input class="opinion__delete" type="submit" value="Usuń">';
        $textHTML.= '</form>';
        $textHTML.= '</div>';
        $textHTML.= '</section>';
        echo $textHTML;
    }
    
}else{
    echo '<section style="padding:25vh 0; color:white;">Nie masz jeszcze żadnych opinii.</section>';
}

unset($_SESSION['imgPath']);
?>