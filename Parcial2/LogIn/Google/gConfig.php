<?php
session_start();

//Include Google client library

 require 'vendor/autoload.php';
// require 'functions.php';


include_once 'vendor/google/apiclient/src/Google/Client.php';
include_once 'vendor/google/apiclient-services/src/Google/Service/Oauth2.php';
include_once 'vendor/google/apiclient-services/src/Google/Service/Plus.php';

/*
 * Configuration and setup Google API
 */
$clientId = '1035547610269-tk6o47sdo5mqf1bm551r3t95ir7stvvf.apps.googleusercontent.com';
$clientSecret = 'pAaIkNPaG9JImnQxcn6dA5wq';
$redirectURL = 'http://localhost/ProyectosWEB/ClasesWeb/Parcial%202/LogIn/Google/index.php';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Google Sign In');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);
//$gClient->setScopes('https://www.googleapis.com/auth/plus.login');
$gClient->setScopes(array('profile', 'email'));

$google_oauthV2 = new Google_Service_Oauth2($gClient);
//$google_oauthV2 = new Google_Service_Plus($gClient);
?>
