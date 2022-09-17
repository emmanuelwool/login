<?php 
session_start();
require 'fb-login/vendor/autoload.php'; 
$fb= new Facebook\Facebook([
'app_id'=>'528071539035563',
'app_secret'=>'312e4548b9ade036ee7ee5f4b7d99709',
'default_graph_version'=>'v2.5',
]);
$helper=$fb->getRedirectLoginHelper();
$login_url=$helper->getLoginUrl("http://localhost/challenge/");
// $accessToken=$helper->getAccessToken();
// $_SESSION['token']=(string)$accessToken;
//echo $token=$_GET['code'];
try{
$accessToken=$helper->getAccessToken();


if(isset($accessToken)){
    $_SESSION['token']=(string)$accessToken;
    header('location: dashboard.php');
}
}catch(Exception $exc){
echo $exc->getTraceAsString();
    
}
if ($_session['token']){

    try{
        $fb->setDefaultAccessToken($_session['token']);
        $res=$fb->get('/me?locale=en_us&fields=name,email');
        $user=$res->getGraphUser();
       echo $user->getField('name');

    }catch(Exception $exc){
        echo $exc->getTraceAsString();
    }
   
}
?>