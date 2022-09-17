<?php
namespace Phppot;

if (isset($_GET["action"]) && $_GET["action"] == "login") {
    require_once __DIR__ . '/lib/TwitterOauthService.php';
    $twitterOauthService = new TwitterOauthService();
    $redirectUrl = $twitterOauthService->getOauthVerifier();
    header("Location: " . $redirectUrl);
    exit();
}

session_start();
if (isset($_SESSION["id"])) {
    $memberId = $_SESSION["id"];
}
session_write_close();

?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="phppot-container">
<?php
if (empty($memberId)) {
    ?>
    <a href="?action=login"> <img class="twitter-btn"
            src="sign-in-with-twitter.png"></a>
<?php
} else {
    require_once './lib/Member.php';
    $member = new Member();
    $userData = $member->getUserById($memberId);
    ?>
<div class="welcome-messge-container">
            <img src="<?php echo $userData[0]["photo_url"]; ?>"
                class="profile-photo" />
            <div>Welcome <?php echo $userData[0]["screen_name"]; ?></div>
        </div>
<?php
}
?>
</div>
</body>
</html>
