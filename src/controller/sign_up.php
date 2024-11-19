<?php
session_start();

include_once 'inc/conn.php';
include_once '../model/Users.php';

function hashToElevenDigitId($input)
{
    // Băm chuỗi bằng hàm hash SHA-256
    $hash = hash('sha256', $input);
    // Chuyển hash thành số nguyên lớn
    $numericHash = base_convert($hash, 16, 10);
    // Lấy 6 chữ số cuối từ số nguyên
    $ElevenDigitId = substr($numericHash, -11);
    return $ElevenDigitId;
}
function hashPassword($input)
{
    // Băm chuỗi bằng hàm hash SHA-256
    $hash = hash('sha256', $input);
    // Chuyển hash thành số nguyên lớn
    $password = base_convert($hash, 16, 10);
    
    return $password;
}

if(isset($_POST['Sign_Up'])){

// Prepare SQL query to fetch user details
 // Chuẩn bị câu truy vấn SQL
    $query = $pdo->prepare("INSERT INTO `users` (`id`,`email`, `password`, `fullname`, `phone`, `birthday`, `address`, `role`, `status`) 
    VALUES ( :id ,:email, :password, :fullname, :phone, :birthday, :address, :role, :status)");

$Email = $_POST['Email'];
$Id = hashToElevenDigitId($Email);
$Username = $_POST['Username'];
$Password = hashPassword($_POST['Password']);
$Full_Name = $_POST['Full_Name'];
if(!isset($_POST['Phone'])) $Phone = null;
$Phone = $_POST['Phone'];
$Birthday =  $_POST['Birthday'];
if(!isset($_POST['$Address'])) $Address = null;
$Address = $_POST['Address'];
$role = 'user';
$active = 'active';

$query->bindParam(':id', $Id );
$query->bindParam(':email', $Email);
$query->bindParam(':password', $Password);
$query->bindParam(':fullname', $Full_Name);
$query->bindParam(':phone', $Phone);
$query->bindParam(':birthday', $Birthday);
$query->bindParam(':address', $Address);
$query->bindParam(':role', $role);
$query->bindParam(':status',$active );


try{
    $query->execute();
    $result = $query->fetch();
    if($result){
        $user = new Users($Id,$Email,$Password,$Full_name,$Phone,$Birthday,$Address,$Role,$Status);
        $_SESSION['user_session'] = $Email;
        // Dieu huong cho admin
        if($Full_name === 'admin') { 
               Header("Location: ../view/admin.html");
               exit; 
        } else {
        // Dieu huong cho user
        Header("Location: ../view/index.html");
        }
    } else {
        $_SESSION['what_error'] = "what tf is this error ?";
        echo $_SESSION['what_error'];
    }
} catch(Exception $e){
        $errorcode = $e->getcode();
         switch($errorcode) {
            case '23000':
                $_SESSION['error'] = "Account Exists !";
                 break;
            case '42000':
                $_SESSION['error'] = "Invalid character, please try again !";
                 break;
            default:
                $_SESSION['error'] = "Lỗi không xác định: " . $e->getMessage();
                 break;
         }
    }
}

?>