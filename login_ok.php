<?php
include_once 'db.php';
include_once 'api.php';

$userID=$_POST['userID'];
$userPassword=$_POST['userPassword'];
$sql="SELECT * FROM member WHERE member_id='$userID' and member_password='$userPassword'";
$stmt=mq($sql);

if(empty($stmt) ){
 header("Location: ./error.php?error=wronglogin");
}
else{
  session_start();
  $_SESSION['userID'] = $userID;
  $_SESSION['isLogged'] = 1;
  header("Location: ./list.php");
}
?>

