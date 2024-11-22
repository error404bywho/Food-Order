<?php
include_once 'Confirm_Email.php';
include_once 'inc/conn.php';
include_once 'inc/function_users.php';
include_once '../model/Users.php';

if(isset($_POST['Sign_Up'])){

$Email = $_POST['Email'];  //normal
$Id = hashToElevenDigitId($Email); // hash id
$Username = $_POST['Username']; //normal
$Password = hashPassword($_POST['Password']); // hash password
$Full_Name = $_POST['Full_Name'];
if(!isset($_POST['Phone'])) $Phone = null;   // no phone is null value
$Phone = $_POST['Phone'];
$Birthday =  $_POST['Birthday'];    //normal
if(!isset($_POST['$Address'])) $Address = null; //no address is null value
$Address = $_POST['Address'];
$role = 'user';         //normal
$active = 'active';     //normal
$user = new Users($Id,$Email,$Password,$Full_Name,'','','user','active');
$result = Insert_User($pdo,$user);
switch ($result) {
    case '200':
        $_SESSION['user_id'] = $user->Get_Id();
        $_SESSION['email'] = $user->Get_Email();
        Header("Location : Confirm_Email.php");
        break;
    case '400':
        $_SESSION['error'] = "Something wrong here ! please try again ! ";
        session_destroy();
        Header("Location : ../view/sign_up.php");
        break;
    case '23000':
        $_SESSION['error'] = "Email Exists please try again !";
         break;
    case '42000':
        $_SESSION['error'] = "Invalid character, please try again !";
         break;
    default:
        $_SESSION['error'] = "Lỗi không xác định: " . $e->getMessage();
         break;
}

} 

?>