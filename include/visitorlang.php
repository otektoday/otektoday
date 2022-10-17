<?php

include_once '../dataconn/db.con.php';
$conn->set_charset('utf8');

include 'function.php';

//session_start();

if(!empty($_GET['bpage'])){
  $pagesub = $_GET['bpage'];
} else {
  $pagesub = 'home/';
}

if (empty($_SESSION['mypage'])) {
  $_SESSION['mypage'] = $pagesub;
}

  $cookie_name = 'Lang';
if(!empty($_GET['lang'])){
  switch ($_GET['lang']) {
    case 'en':
      $_SESSION['userlang']='en';
      $cookie_value = 'en';
    break;
    case 'ar':
      $_SESSION['userlang']='ar';
      $cookie_value = 'ar';
    break;
    case 'tr':
      $_SESSION['userlang']='tr';
      $cookie_value = 'tr';
    break;    
    default:
      $_SESSION['userlang']='en';
      $cookie_value = 'en';
    break;
}
}else{
  $_SESSION['userlang']='en';
  $cookie_value = 'en';
}
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
header('Location:../'.$pagesub);
die();

 ?>
