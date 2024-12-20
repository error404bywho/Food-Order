<!-- ================================== REGISTER BY GOOGLE ================================== -->
<?php
session_start();
include_once '../model/Users.php';
include_once '../controller/inc/conn.php';
include_once '../controller/inc/function_users.php';
include_once '../controller/inc/conn.php';
require "2-google.php";

function Send_Password_To_Email($Random_Password){
    /*
    Send password to email
    */
    
}

if (isset($_GET["code"])) {
    //lay ra gia tri token
    $token = $goo->fetchAccessTokenWithAuthCode($_GET["code"]);
    /*  
        SIGN UP BANG GMAIL CO 3 KHA NANG : 
        1. DANG KI THANH CONG 
        1.1 DANG KI DA TON TAI TAI KHOAN => LAY RA USERNAME, EMAIL VA GENERATE RANDOM PASSWORD GUI VE MAIL
        1.2 DANG KI DA CO TAI KHOAN ==> KIEM TRA DB LAY RA NGUOI DUNG THEO EMAIL 
        2. DANG KI FAIL
        */
    if (!isset($token["error"])) {  //1. DANG KI THANH CONG
        
        // Gán Access Token vào Google Client
        $goo->setAccessToken($token['access_token']);
        $oauth2 = new Google_Service_Oauth2($goo);
        // Gọi API để lấy thông tin người dùng
        $google_user_info = $oauth2->userinfo->get();
        $email = $google_user_info['email'] ?? null;    // email

        $user = Check_Exist_By_Email($email);
        // 1.1 DANG KI DA TON TAI TAI KHOAN ==> KIEM TRA DB LAY RA NGUOI DUNG THEO EMAIL VA DANG NHAP
        if($user){ 
                $_SESSION['user_id'] = $user->Get_Id();
                header("Location: index.php");  //login success
                exit();
        } else // 1.2 DANG KI CHUA CO TAI KHOAN => LAY RA USERNAME VA EMAIL, GENERATE RANDOM PASSWORD, GUI VE MAIL PASSWORD
            {
                
                // Xử lý thông tin người dùng
                $Random_Password = generateRandomPassword(12);  
                $name = $google_user_info['name'] ?? null;      // full name
                $id = hashToElevenDigitId($email);              // id
                $password = hashPassword($Random_Password);    // password
             
                
              
                
                $_SESSION['user_id'] = Insert_User($email,$password,$name,'','','','user','active');
                Send_Password_To_Email($Random_Password);
                header("Location: index.php");  //login success
            }
       
    } else {  // 2. DANG KI FAIL    
        echo "sign up failed, please try again !";
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
        <?php  if(isset($_SESSION['error'])) echo 'sdvhbsjhbv ksdvjbksdvbksdbvksdj' ?>
        <input type="submit" name="Sign_Up">
    </form>
    <p>---- OR ---- </p>
    
     <a href="<?php echo $goo->createAuthUrl();?>" class="google-button">
        <i class="fa-brands fa-google google-logo"></i>
        Continue with Google
    </a>

</body>
</html>