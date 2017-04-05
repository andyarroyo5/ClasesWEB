<?php
session_start();
// added in v4.0.0
require 'vendor/autoload.php';
require 'functions.php';

//use vendor/graph-sdk/src/Facebook/FacebookFacebookSession;
use Facebook\Helpers\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;


// init app with app id and secret
//FacebookSession::setDefaultApplication( '1241839402601707','74281e175be7f9af2f36c4f6934d0c62');
$fb = new Facebook\Facebook([
  'app_id' => '1241839402601707',
  'app_secret' => '74281e175be7f9af2f36c4f6934d0c62',
  'default_graph_version' => 'v2.5',
]);



$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('fbconfig.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';


// login helper with redirect_uri
  //  $helper = new FacebookRedirectLoginHelper('fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
  checkuser($fuid,$ffname,$femail);
  header("Location: index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>
