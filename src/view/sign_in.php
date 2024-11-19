

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodies</title>
    <link rel="stylesheet" href="../../assets/css/login1.css">
</head>
<body>

<!-- =========================LOGIN FORM========================= -->
<form method='POST' action="../controller/sign_in.php">
    <b>login</b> <br>
    email : <input type="text" name="email" required placeholder = "Enter your Email"> 
    <br>
    password : <input type="text" name="password" required placeholder = "Password">    
    <br>
   
    <!--NOTE :  DÒNG NÀY LÀ THÔNG BÁO LỖI XUẤT HIỆN Ở BÊN TRÊN NÚT SIGN IN  -->
    <?php session_start(); if(isset($_SESSION['error']))  {echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";}  ?>
    <!--NOTE :  DÒNG NÀY LÀ THÔNG BÁO LỖI XUẤT HIỆN Ở BÊN TRÊN NÚT SIGN IN -->

    <input type="submit" name = "Sign_In" value="Sign In">
</form>
<p>------- OR -------</p>
<p>haven't have account ? Sign up here !</p>
<a href="sign_up.php"><button>sign up</button></a>
    
<!-- =========================LOGIN FORM========================= -->
</body>
</html>
