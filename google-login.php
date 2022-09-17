<?php
require_once 'google-login/vendor/autoload.php';
session_start();
// init configuration
$clientID = '837431205386-44qp92evq1hq2889amnao57orjtlpgg4.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/challenge/google-login.php';
   
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('profile');
$client->addScope('email');

  
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);
   
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
   $google_account_info = $google_oauth->userinfo->get();
   $_SESSION['gacc']=$google_account_info;
   $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $id =  $google_account_info->id;
  $gname =  $google_account_info->givenName;
  $fname =  $google_account_info->familyName;
   $locale =  $google_account_info->locale;
   $vemail =  $google_account_info->verifiedEmail;
   $photo =  $google_account_info->picture;
$_SESSION['email']=$email;
$_SESSION['gid']=$id;
$_SESSION['name']=$name;
$_SESSION['gname']=$gname;
$_SESSION['photo']=$photo;
   
  
  if (isset($_SESSION['gid'])) {
    header('Location: dashboard.php');
    }
  
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  //echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>