<?php 
// client library
require("../../vendor/autoload.php");

// client Google object
$goo = new Google\Client();
$goo->setClientId("564127496586-ldleqg8dtkvle3ra12iq6od02neu5pr4.apps.googleusercontent.com");
$goo->setClientSecret("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");
$goo->setRedirectUri("http://localhost/DAW/src/view/login.php");

// Add scopes (you should specify the scopes you need)
$goo->addScope("email");
$goo->addScope("profile");
