<?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor_email/PHPMailer/src/Exception.php';
require '../../vendor_email/PHPMailer/src/PHPMailer.php';
require '../../vendor_email/PHPMailer/src/SMTP.php';

include '../model/Users.php';
?>
<?php
$email = $_POST['email'] ?? null; // Nếu không tồn tại, $email sẽ là null


// GENERATE CODE 6 DIGIT
$Code = rand(343434,987654);
//send to email

?>
<?php

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

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
    $mail->addAddress('connguathanhtroia@gmail.com', 'Joe User');     //Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '<h1><b>11032005<b/></h1>';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
<?php 

if(isset($_POST['code'])){
    //get input code
    $Input_User = $_POST['code'];
    $Code = '11032005';
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