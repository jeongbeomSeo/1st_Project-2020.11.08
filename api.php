<?php
  include_once 'db.php';

  function mq($sql){  //mysqli_query
    global $conn;
    return mysqli_query($conn,$sql);
  }

  function getUserID(){
    return $_SESSION['userID;'];
  }

  function delete($userID, $board_ID, $table){
    if($_SESSION['userID'] == $userID){
      echo $delete_Info="DELETE FROM $table WHERE id='$board_ID'";
      mq($delete_Info);
      header("Location:./list.php");
    }else{
      header("Location:./error.php?error=notAuthority");
    }
  }

  function comment_input($title, $description, $topic_ID){
    if(empty($title)){
      header("Location: ./error.php?error=NotBlank");
    }
    else{
      $input_info="INSERT INTO comment (title, description, member_id, topic_id) VALUES('$title', '$description', '$_SESSION[userID]', '$topic_ID')";
      mq($input_info);
      header("Location:./list.php");
    }
  }

  function input($title, $description){
    if(empty($title)){
      header("Location: ./error.php?error=NotBlank");
    }
    else{
      $input_info="INSERT INTO topic (title, description, member_id) VALUES('$title', '$description', '$_SESSION[userID]')";
      mq($input_info);
      header("Location:./list.php");
    }
  }

  function modify($title, $description, $board_ID ,$table){
    if( empty($title)){
      header("Location: ./error.php?error=NotBlank");
    }
    else{
      $input_info="UPDATE $table SET title='$title', description='$description' WHERE id='$board_ID'";
      mq($input_info);
      header("Location: ./list.php");
    }
  }
?>