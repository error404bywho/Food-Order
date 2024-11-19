<?php
// session_start();
// if(isset($_SESSION["token"])){
//     header("Location: index.php"); exit(); 
// }

// require "2-google.php";
// if (isset($_GET["code"])) {
//     $token = $goo->fetchAccessTokenWithAuthCode($_GET["code"]);
//     if (!isset($token["error"])) {
//         // Save token as JSON string to session
//         $_SESSION["token"] = $token;
//         header("Location: index.php");
//         exit();
//     }
// }

?>

<!-- <a href="<?php // echo $goo->createAuthUrl();  ?>"> register </a>  -->
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodies</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
</head>
<body>
    <form action="login.php"></form>
                <?php 
                      if(isset($token["error"])) { 
                            print_r($token);
                            print_r(var_dump($token)); 
                        } 
                 ?>            
</body>
</html>
