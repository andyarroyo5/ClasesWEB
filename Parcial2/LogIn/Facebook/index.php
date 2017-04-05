<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    session_start();
    require_once __DIR__ . '/vendor/autoload.php';
    require 'functions.php';
    $fb = new Facebook\Facebook([
      'app_id' => '1241839402601707', // Replace {app-id} with your app id
      'app_secret' => '74281e175be7f9af2f36c4f6934d0c62',
      'default_graph_version' => 'v2.5',
      // 'persistent_data_handler'=>'session'
    ]);
    ?>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>



    <?php if (isset($_SESSION['fb_access_token'])): ?>      <!--  After user login  -->
      <div class="container">
      <div class="hero-unit">
        <h1>Hello <?php echo $_SESSION['fb_access_token']; ?></h1>
        <p>Welcome to "facebook login" tutorial</p>
      </div>


      <?php

      try {

      // Returns a `Facebook\FacebookResponse` object
      $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
      $response = $fb->get('/me?fields=id,name,email,picture');
      $res = $fb->get( '/me/picture?type=large&redirect=false' );

      $picture = $res->getGraphObject();

      echo "This is the picture request". $picture;

      //$userNode = $response->getGraphUser();
    //  var_dump($userNode);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      $user = $response->getGraphUser();

      echo 'Name: ' . $user['name'];
      echo "<img src='". $picture['url']."'></img>";

      checkuser($user['id'],$user['name'],$user['email']);
      //var_dump(  $userNode['picture'] );
    // OR
    // echo 'Name: ' . $user->getName();

       ?>
      <li class="nav-header">Facebook fullname</li>
      <!-- <li><?php //echo $_SESSION['FULLNAME']; ?></li> -->
      <div><a href="logout.php">Logout</a></div>
      </ul></div></div>
          <?php else: ?>     <!-- Before login -->
      <div class="container">
      <h1>Login with Facebook</h1>
                 Not Connected
          <div>
          <?php
          $helper = $fb->getRedirectLoginHelper();

          $permissions = ['public_profile','email']; // Optional permissions
          $loginUrl = $helper->getLoginUrl('http://localhost/ProyectosWEB/ClasesWeb/Parcial%202/LogIn/Facebook/fb-callback.php', $permissions);

          echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
            ?>
          </div>
      </div>
      <?php endif ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
