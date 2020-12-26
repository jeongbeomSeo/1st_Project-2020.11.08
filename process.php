<?php
include_once 'db.php';
include_once 'api.php';

$result_user = mq("SELECT * FROM member");

switch($_GET['mode']){
  case 'signup' :
    $member_id =$_POST['member_id'];
    $member_password =$_POST['member_password'];
    $member_name =$_POST['member_name'];
    $member_info="INSERT INTO member (member_id,member_password,member_name) VALUES('$member_id','$member_password','$member_name')";
    $member_result=mysqli_query($conn,$member_info);
    if($member_result){
      header("Location: index.html");
    }else {
      echo "failed to register";
    }
    break;

    case 'input' :
        $title=$_POST['title'];
        $description=$_POST['description'];
        input($title, $description);
    break;

    case 'delete' :
      $userID = $_POST['delete_user_ID'];
      $board_ID = $_POST['id'];
      $table = "topic";
      delete($userID, $board_ID, $table); 
    break;
    case 'modify' :
        $title=$_POST['title'];
        $description=$_POST['description'];
        $topic_id=$_POST['topic_id'];
        $table = "topic";
        modify($title, $description, $topic_id, $table);
    break;

    case 'comment_input' :
      $title=$_POST['title'];
      $description=$_POST['description'];
      $topic_id=$_POST['topic_id'];
      comment_input($title, $description, $topic_id);
      break;

    case 'comment_modify' :
        $title=$_POST['title'];
        $description=$_POST['description'];
        $comment_id=$_POST['comment_id'];
        $table = "comment";
        modify($title, $description, $comment_id, $table);

    break;

    case 'comment_delete' :
      $userID = $_POST['delete_user_ID'];
      $board_ID = $_POST['comment_id'];
      $table = "comment";
      delete($userID, $board_ID, $table);
    break;
    
    case 'default' :
      header("Location: ./index.html");
    break;
  }
?>