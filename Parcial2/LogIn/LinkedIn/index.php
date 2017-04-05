<?php
require 'config.php';
require 'User.php';
/*if ($config['Client_ID'] === '86cqz8xr0pmuuq' || $config['Client_Secret'] === 'DVApwnAhBEhK2yNq') {
 echo 'You need a API Key and Secret Key to test the sample code. Get one from <a href="https://www.linkedin.com/developer/apps/">https://www.linkedin.com/developer/apps/</a>';
 exit;
}*/
echo $config['Client_ID'];
echo $config['Client_Secret'] ;

var_dump($config['callback_url']);

$output='<a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id='.$config['Client_ID'].'&redirect_uri='.$config['callback_url'].'&state=98765EeFWf45A53sdfKef4233&scope=r_basicprofile r_emailaddress"><img src="./images/linkedin_connect_button.png" alt="Sign in with LinkedIn"/></a>';


if(isset($_GET['code'])) // get code after authorization
{

      // echo "<script>
      //
      //    function myFunction() {
      //        location.assign('". $config['home']. "');
      //    }
      //
      //     myFunction();
      // </script>";


    $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
    $param = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$config['callback_url'].'&client_id='.$config['Client_ID'].'&client_secret='.$config['Client_Secret'];
    $return = (json_decode(post_curl($url,$param),true)); // Request for access token
    if($return['error']) // if invalid output error
    {
       $content = 'Some error occured<br><br>'.$return['error_description'].'<br><br>Please Try again.';
    }
    else // token received successfully
    {
       $url = 'https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token='.$return['access_token'];
       $User = json_decode(post_curl($url)); // Request user information on received token

       $user = new User();

     //Insert or update user data to the database
     $linkedInUserData = array(
         'oauth_provider'=> 'linkedin',
         'oauth_uid'     => $id,
         'first_name'    => $firstName,
         'last_name'     => $lastName,
         'email'         => $emailAddress,
         'position'      => $position,
         'profileURL'    => $profileURL,
         'picture'       => $pictureUrls,
         'headline'      => $headline
     );

     print_r($linkedInUserData);

     $userData = $user->checkUser($linkedInUserData);
     $_SESSION['userData'] = $userData;

   //Render Google profile data
   if(!empty($userData)){
       $output = '<h1>Google+ Profile Details </h1>';
       $output .= '<img src="'.$linkedInUserData['picture'].'" width="300" height="220">';
       $output .= '<br/>Google ID : ' . $linkedInUserData['oauth_uid'];
       $output .= '<br/>Name : ' . $linkedInUserData['first_name'].' '.$userData['last_name'];
       $output .= '<br/>Email : ' . $linkedInUserData['email'];
       $output .= '<br/>Logged in with : LinkedIn';
       $output .= '<br/><a href="'.$linkedInUserData['headline'].'" target="_blank">Click to Visit Linked+ Page</a>';
       $output .= '<br/>Google<a href="logout.php">Log Out</a>';
   }else{
       $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
   }
   //
   //     ('$id',
   //     '$firstName',
   //     '$lastName',
   //     '$emailAddress',
   //     '$position',
   //     '$location',
   //     '$profileURL',
   //     '$pictureUrls',
   //     '$headline')";
   //     mysqli_query($connection,$query);
   // }*/

   }
}
 ?>
<div><?php echo $output; ?></div>
