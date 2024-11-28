<?php
include_once 'inc/conn.php';
include_once 'inc/function_users.php';
include_once '../model/Users.php';

if(isset($_POST['Sign_Up'])){

$Email = $_POST['Email'];  //normal
// $Id = hashToElevenDigitId($Email); // hash id
$Username = $_POST['Username']; //normal
$Password = hashPassword($_POST['Password']); // hash password
$Full_Name = $_POST['Full_Name'];

if(!isset($_POST['Phone'])) $Phone = null;   // no phone is null value
$Phone = $_POST['Phone'];

if(!isset($_POST['Birthday'])) $Birthday = null;    //normal
$Birthday =  $_POST['Birthday'];

if(!isset($_POST['$Address'])) $Address = null; //no address is null value
$Address = $_POST['Address'];

$role = 'user';         //normal
$status = 'active';     //normal

// $user = new Users($Email,$Password,$Full_Name,$Phone,$Address,$role,$status);
$result = Insert_User($pdo,$Email,$Password,$Full_Name,$Phone,$Birthday,$Address,$role,$status);
switch ($result) {
    case '200': // ok

        Header("Location: Confirm_Email.php?email=$Email&&full_name=$Full_Name"); 
        break;
    case '400':
        $_SESSION['error'] = "Something wrong here ! please try again !";
        session_destroy();
        Header("Location: ../view/404.html");
        break;
    case '23000':   //trung gmail,id
        // Header("Location: ../view/index.php");
         $_SESSION['error'] = "Email Exists please try again !";
        //  Header("Location: ../view/sign_up.php"); 
         echo $_SESSION['error'];
         break;
    case '42000':
        $_SESSION['error'] = "Invalid character, please try again !";
        echo $_SESSION['error'];
        break;
    default:
        $_SESSION['error'] = "Lỗi không xác định: ";
        echo $_SESSION['error'];
        break;
}

} 

?>