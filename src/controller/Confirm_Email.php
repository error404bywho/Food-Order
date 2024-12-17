<?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor_email/PHPMailer/src/Exception.php';
require '../../vendor_email/PHPMailer/src/PHPMailer.php';
require '../../vendor_email/PHPMailer/src/SMTP.php';


include '../model/Users.php';
include '../controller/inc/function_users.php';
?>

<?php

$Email = $_GET['email'] ; 
$Full_Name = $_GET['full_name'] ; 

$SendToEmail =caesarEncode($Email,-3);
$WithFullName = caesarDecode($$Full_Name,-3);

$Code = rand(343434,987654);

// GENERATE CODE 6 DIGIT

//send to email

?>
<?php

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($SendToEmail) && isset($WithFullName)){
    try {
   
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vuld.23ceb@vku.udn.vn';                     //SMTP username
        $mail->Password   = 'sqhceilkdncwiefu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('vuld.23ceb@vku.udn.vn', 'MeatEater');
        $mail->addAddress($SendToEmail, $WithFullName);     //Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirm Your Email Address Before Enjoy Meal :) ! ';
        
        $mail->Body    = '
        <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        color: #333;
                        line-height: 1.6;
                        background-color: #fafafa;
                        margin: 0;
                        padding: 0;
                    }
                    .email-content {
                        background-color: #ffffff;
                        padding: 30px;
                        border-radius: 10px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        margin: 20px auto;
                        width: 80%;
                        max-width: 600px;
                    }
                    .email-content h2 {
                        font-size: 22px;
                        color: #FF6347; /* Tomato Red */
                        margin-bottom: 20px;
                        text-align: center;
                    }
                    .email-content p {
                        font-size: 16px;
                        margin: 12px 0;
                        color: #555;
                    }
                    .confirmation-code {
                        font-size: 24px;
                        font-weight: bold;
                        color: #fff;
                        background-color: #FF4500; /* Orange Red */
                        padding: 10px 20px;
                        border-radius: 8px;
                        text-align: center;
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                        display: inline-block;
                        margin: 10px 0;
                    }
                    .footer {
                        margin-top: 30px;
                        font-size: 14px;
                        text-align: center;
                        color: #999;
                    }
                    .footer a {
                        color: #1E90FF; /* Dodger Blue */
                        text-decoration: none;
                    }
                    .footer a:hover {
                        text-decoration: underline;
                    }
                    .highlight {
                        color: #FF6347; /* Tomato Red */
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <div class="email-content">
                    <h2>Hello, '.$WithFullName.' ! </h2>
                    <p>Thank you for signing up! To complete your registration, please confirm your email address by using the code below:</p>
                    <p><strong class="highlight">Your confirmation code:</strong></p>
                    <p class="confirmation-code">' . $Code . '</p>
                    <p>Simply enter the code in the appropriate field on the registration page, and you will be all set.</p>
                    <p>If you did not request this, please ignore this email.</p>
                    <div class="footer">
                        <p>Best regards,</p>
                        <p><strong>MeatEater - Food Order Website</strong><br>MeatEater@gmail.com</p>
                        <p><a href="http://meateater.unaux.com/">Visit Our Website</a></p>
                    </div>
                </div>
            </body>
        </html>
    ';
    
    
    
    $mail->AltBody = "Hello, $WithFullName !
    
    Thank you for signing up! To complete your registration, please confirm your email address by using the code below:
    
    Your confirmation code: $Code
    
    
    Simply enter the code in the appropriate field on the registration page, and you'll be all set.
    
    If you did not request this, please ignore this email.
    
    Best regards,
    MeatEater - Food Order Website. 
    MeatEater@gmail.com";
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $_SESSION['error']= 'khong co gi het';
}

?>
<?php 

if(isset($_POST['code'])){
    //get input code
    $Input_User = $_POST['code'];
    
    // handle times input
    $Input_Limit = 4;

    if($Input_User === $Code){ 
         Header("Location: ../view/index.php"); exit;
        // echo '<meta http-equiv="refresh" content="0;url=../view/index.php"'; exit();
    } else {
        if($Input_Limit === 0 ){
            header("Location: ../view/404.html");session_destroy();exit;
            
        } else {
            $_SESSION['error'] = "Invalid code ! please try again. " ."<br> "."($Input_Limit-1) times enter code !";
        }
       
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    code <input type="number" name="code">
    <?php if(isset($_SESSION['error'])) echo $_SESSION['error'] ?>
    <?php if(isset($_SESSION['test'])) echo $_SESSION['test'] ?>
    
    <input type="submit">
    </form>
</body>
</html>