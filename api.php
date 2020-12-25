<?php
  include_once 'db.php';

  function mq($sql){  //mysqli_query
    global $conn;
    return mysqli_query($conn,$sql);
  }

  function getUserID(){
    return $_SESSION['userID;'];
  }

  function delete($userID, $board_ID){
    if($_SESSION['userID']==$_POST[$userID]){
      
    }
  }
?>