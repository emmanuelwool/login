<?php
session_start();
if (isset($_SESSION['facebook_access_token'])){
  echo  "<h3>Facebook  LOGIN SUCCESSFUL</h3>"."<br>".$_SESSION['fb_id']."<br>"."Welcome".$_SESSION['fb_name'].$_SESSION['fb_email'].$_SESSION['fb_pic'];
  echo  "<a href='logout.php'> Logout </a>";
}

else if (isset($_SESSION['gid'])){
  ?>
  <img src="<?php echo $_SESSION['photo']; ?>"/>
  <?php
  echo  "<h3> Google LOGIN SUCCESSFUL</h3>"."<br>"."GoogleID::".$_SESSION['gid']."<br>"."Fullname::".$_SESSION['name']."<br>"."Email::".$_SESSION['email']."<br>";
  echo  "<a href='logout.php'> Logout </a>";
}else if(isset($_SESSION["id"])) {
  $memberId = $_SESSION["id"];
    //require_once './twitter-oauth/lib/Member.php';
    //$member = new Member();
    //$userData = $member->getUserById($memberId);
  ?>
<div class="welcome-messge-container">
        <img src="<?php echo $_SESSION['photo'];?>" width="50px" height="50px" class="profile-photo"/>
            <div>Welcome <?php echo $_SESSION['name']; ?></div>
           <a href='logout.php'> Logout </a>
        </div>
        <?php
}
else{

    header('location:index.php');
}

?>