<?php
include_once 'db.php';
include_once 'api.php';

$userID = $_POST['userID'];
$userPassword = $_POST['userPassword'];
$sql ="SELECT * FROM member WHERE member_id='$userID' and member_password='$userPassword'";
$stmt = mq($sql);
$row = mysqli_fetch_array($stmt);


if ($userID == $row['member_id'] && $userPassword == $row['member_password']) {
  session_start();
  $_SESSION['userID'] = $userID;
  $_SESSION['isLogged'] = 1;
  header("Location: ./list.php");
} else{
  error('wronglogin');
}
?>

