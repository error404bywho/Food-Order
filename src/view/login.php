<?php
session_start();
if(isset($_SESSION["token"])){
    header("Location: index.html"); exit();
}

require "2-google.php";
if (isset($_POST["code"])) {
    $token = $goo->fetchAccessTokenWithAuthCode($_POST["code"]);
    if (!isset($token["error"])) {
        // Save token as JSON string to session
        $_SESSION["token"] = json_encode($token);
        header("Location: index.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodies</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
    
</head>
<body>
    
            <form method="POST">
                <input type="email" placeholder="Enter the email">
                <input type="password" placeholder="Enter the password">
                <input type="submit" name="login" id="login" value="login">
                <?php   if(isset($token["error"])) { ?>
                <div>   <?php print_r($token); ?>   </div>
                <a href="<?php $goo->createAuthUrl(); } ?>">
                    <input type="submit" name="code" id = "register" value="register by google">
                </a>
            </form>
       
     
   
</body>

</html>
