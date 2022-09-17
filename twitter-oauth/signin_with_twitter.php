<?php
namespace Phppot;

require_once './lib/TwitterOauthService.php';
$TwitterOauthService = new TwitterOauthService();

session_start();
$oauthTokenSecret = $_SESSION["oauth_token_secret"];

if (! empty($_GET["oauth_verifier"]) && ! empty($_GET["oauth_token"])) {
    $userData = $TwitterOauthService->getUserData($_GET["oauth_verifier"], $_GET["oauth_token"], $oauthTokenSecret);
    $userData = json_decode($userData, true);
    if (! empty($userData)) {
        $oauthId = $userData["id"];
        $_SESSION['oau']=$oauthId;
        $fullName = $userData["name"];
        $_SESSION['name']=$fullName;
        $screenName = $userData["screen_name"];
        $_SESSION['screen']=$screenName;
        $photoUrl = $userData["profile_image_url"];
        $_SESSION['photo']=$photoUrl;

        require_once './lib/Member.php';
        $member = new Member();
        $isMemberExists = $member->isExists($oauthId);
        if (empty($isMemberExists)) {
            $memberId = $member->insertMember($oauthId, $fullName, $screenName, $photoUrl);
        } else {
            $memberId = $isMemberExists[0]["id"];
        }
        if (! empty($oauthId)) {
            unset($_SESSION["oauth_token"]);
            unset($_SESSION["oauth_token_secret"]);
            $_SESSION["id"] = $oauthId;
            header("Location: ../dashboard.php");
        }
    }
} else {
    ?>
<HTML>
<head>
<title>Signin with Twitter</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="phppot-container">
        <div class="error">
            Sorry. Something went wrong. <a href="index.php">Try again</a>.
        </div>
    </div>
</body>
</HTML>
<?php
}
session_write_close();
exit();
