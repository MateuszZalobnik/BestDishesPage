<?php

require_once 'database.php';



if(isset($_GET['filter'])){
    
    switch($_GET['filter']){
        case 'dateUp':
            $filter = 'date DESC';

            break;
        case 'dateDown':
            $filter = 'date ASC';

            break;
        case 'priceUp':
            $filter = 'price ASC';
            break;
        case 'priceDown':
            $filter = 'price DESC';

            break;
        default:
            $filter = 'date DESC';

            break;
            
    }

}else{
$filter = 'date DESC';
}

$opinionsQuery = $db->query('SELECT * FROM opinions ORDER BY '.$filter);
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
    $textHTML.='<section class="proposal">';
    $textHTML.= '<img src="'.$_SESSION['imgPath'].'img/food_category/'.$opinion['dishCategory'].'.png" alt="'.$opinion['dishCategory'].'" class="proposal__img">';
    $textHTML.= '<div class="proposal__block">';
    $textHTML.= '<h3 class="proposal__name">'.$opinion['dishName'].'</h3>';
    $textHTML.= '<span class="proposal__price">Price: '.$opinion['price'].'zł</span>';
    $textHTML.= '</div>';
    $textHTML.= '<div class="proposal__block">';
    $textHTML.= '<h4 class="proposal__restaurant">'.$opinion['restaurantName'].'</h4>';
    $textHTML.= '<h4 class="proposal__restaurant">'.$opinion['restaurantAdress'].'</h4>';
    $textHTML.= '</div>';
    $textHTML.= '<div class="proposal-rating">';
    $textHTML.= '<span>flavour: '.$rating[0]['flavour'].'/10</span>';
    $textHTML.= '<span>service: '.$rating[0]['service'].'/10</span>';
    $textHTML.= '<span>price: '.$rating[0]['price'].'/10</span>';
    $textHTML.= '</div>';
    $textHTML.= '<div class="proposal__user">';
    $textHTML.= '<span>user: '.$user[0]['username'].'</span>';
    $textHTML.= ' <span>'.$levelStr.'</span>';
    $textHTML.= '<span>'.substr($opinion['date'], 0, 10).'</span>';
    $textHTML.= '</div>';
    $textHTML.= ' </section>';
    echo $textHTML;
}
unset($_SESSION['imgPath']);
?>