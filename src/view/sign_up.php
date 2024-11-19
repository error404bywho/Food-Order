<!-- ================================== REGISTER BY GOOGLE ================================== -->
<?php
session_start();
include '../controller/inc/conn.php';
// if(isset($_SESSION["token"])){ //neu da ton tai token ==> da ton tai tai khoan ==> dang nhap vao luon.
//     header("Location: index.html"); exit(); 
// }
require "2-google.php";
if (isset($_GET["code"])) {
    //lay ra gia tri token
    $token = $goo->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token["error"])) {
       // Prepare SQL query to fetch user details
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetch();

        if($result){
            $Id = $result['$id'];
            $Email = $result['$Email'];
            $Password = $result['$Password'];
            $Fullname = $result['$Fullname'];
            $Phone = $result['$Phone'];
            $Birthday = $result['$Birthday'];
            $Address = $result['$Address'];
            $Role = $result['$Role'];
            $Status = $result['$Status'];
            $user = new Users($Id,$Email,$Password,$Fullname,$Phone,$Birthday,$Address,$Role,$Status);
            
            $_SESSION['user_id'] = $Id;
            header("Location: cart.html"); //login success 
            exit();
        }
    }
}
?>
<!-- ================================== REGISTER BY GOOGLE ================================== -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/form.css">
    <title>Document</title>
</head>
<body>
    <form action="../controller/sign_up.php" method="POST">
        <b>sign up</b><br>
        Email     :     <input type="text" name="Email" required> <br>
        Username  :     <input type="text" name="Username" required><br>
        Password  :     <input type="text" name="Password" required><br> 
        Full Name :     <input type="text" name="Full_Name" required> <br>
        Phone (không bắt buộc)     :     <input type="text" name="Phone" > <br>
        Birthday     :     <input type="text" name="Birthday" > <br>
        Address (Không bắt buộc)   :     <input type="text" name="Address" ><br> 
        <input type="submit" name="Sign_Up">
    </form>
    <p>---- OR ---- </p>
    
     <a href="<?php echo $goo->createAuthUrl();?>" class="google-button">
        <i class="fa-brands fa-google google-logo"></i>
        Continue with Google
    </a>

</body>
</html>