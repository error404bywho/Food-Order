<?php
session_start();
// NOT LOGGED IN
if(!isset($_SESSION["token"])){
    header("Location: sign_up.php"); exit;
}
// TOKEN EXPIRE
require '../view/2-google.php';
$goo->setAccessToken($_SESSION["token"]);
if($goo->isAccessTokenExpired()){
    unset($_SESSION["token"]);
    header("Location: sign_up.php"); exit;
}
echo "<h1>YOU LOGGED IN !</h1>"
?>
