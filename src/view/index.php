<?php
// NOT LOGGED IN 
session_start();
if (!isset($_SESSION["token"])) {
    header("Location: login.php"); 
    exit();  
}

// Include Google Client library
require "2-google.php";

// Set access token
$goo->setAccessToken($_SESSION["token"]);

// Check if token is expired, if so, redirect to login page
if ($goo->isAccessTokenExpired()) {
    header("Location: login.php"); 
    exit();
}

// Fetch user info if token is valid
$google_oauth = new Google_Service_Oauth2($goo);
$user = $google_oauth->userinfo->get();

// Display user info
// echo "<h1>YOU ARE SIGNED IN!</h1>";
// print_r($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOODIE</title>
    <!-- 
     - Favicon
    -->
    <link rel="icon" href="../../assets/images/favicon.ico" type="image/svg+xml">
    <!-- 
     - Custom css link
     -->
     <link rel="stylesheet" href="../../assets/css/main.css">
     <link rel="stylesheet" href="../../assets/css/home.css">
    <!--
     - Google font link 
     -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500;700&display=swap"
  rel="stylesheet">
</head>
<body>

    <!-- 
     -HEADER
    -->

    <header class="header" data-header>

        <div class="top-bar">
            <div class="container">
                <p>Free shiping for all order above 50$</p>
            </div>
        </div>
        
        <div class="nav-wrapper">
            <div class="container">
                <h1 class="h1">
                    <a href="./index.html" class="logo">Food<span class="span">ie</span></a>
                </h1>

                <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                    <ion-icon name="menu-outline"></ion-icon>
                </button>

            <nav class="navbar" data-navbar>

                <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>

                <ul class="navbar-list">
                    <li>
                        <a href="./index.html" class="navbar-link">Home</a>
                    </li>
                    <li>
                        <a href="./index.html" class="navbar-link">About</a>
                    </li>
                    <li>
                        <a href="./index.html" class="navbar-link">Shop</a>
                    </li>
                    <li>
                        <a href="./index.html" class="navbar-link">Blog</a>
                    </li>
                    <li>
                        <a href="./index.html" class="navbar-link">Products</a>
                    </li>
                    <li>
                        <a href="./index.html" class="navbar-link">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="header-action">

                <div class="search-wrapper" data-search-wapper>
                    <button class="header-action-btn">
                        <ion-icon name="search-outline" class="search-icon"></ion-icon>
                        <ion-icon name="close-outline" class="close-icon"></ion-icon>
                    </button>

                    <div class="input-wrapper">
                        <input type="search" name="search" placeholder="Search here" class="search-input">

                        <button class="search-submit" aria-label="Submit search">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                </div>

                <button class="header-action-btn" aria-label="Open whishlist" data-panel-btn="whishlist">
                    <ion-icon name="heart-outline"></ion-icon>

                    <data value="3" class="btn-badge">03</data>
                </button>
                <button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
                    <ion-icon name="basket-outline"></ion-icon>

                    <data value="2" class="btn-badge">02</data>
                </button>
            </div>
            </div>
        </div>

    </header>

    <!-- 
     - Custom JS link
     -->
     <script src="../../assets/js/script.js"></script>

     <!--
     - Ionicon Link
     -->
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>