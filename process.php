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
      if(empty($_POST['title'])){
        header("Location: ./error.php?error=NotBlank");
      }
      else{
        $title=$_POST['title'];
        $description=$_POST['description'];
        $member_id=$_SESSION['userID'];
        $input_Info="INSERT INTO topic (title,description,member_id) VALUES('$title','$description','$member_id')";
        $topic_input=mysqli_query($conn,$input_Info);
        echo $_POST['title'];
        header("Location: ./list.php");
        }
    break;

    case 'delete' :
      if($_SESSION['userID']==$_POST['delete_user_ID']){
        $topicID=$_POST['id'];
        $delete_Info="DELETE FROM topic WHERE id='$topicID'";
        mysqli_query($conn,$delete_Info);
        header("Location:./list.php");
      } else{
        header("Location:./error.php?error=notAuthority");
      }
    break;
    case 'modify' :
      if(empty($_POST['title'])){
        header("Location: ./error.php?error=NotBlank");
      }
      else{
        $title=$_POST['title'];
        $description=$_POST['description'];
        $topic_id=$_POST['topic_id'];
        $input_Info="UPDATE topic SET title='$title', description='$description' WHERE id='$topic_id'";
        mysqli_query($conn,$input_Info);
        header("Location: ./list.php");
        }
    break;

    case 'comment_input' :
      if(empty($_POST['title'])){
        header("Location: ./error.php?error=NotBlank");
      } else{
        $title=$_POST['title'];
        $description=$_POST['description'];
        $member_id=$_SESSION['userID'];
        $topic_id=$_POST['topic_id'];
        $input_info="INSERT INTO comment (title, description, member_id, topic_id) VALUES('$title','$description','$member_id',$topic_id)";
        mysqli_query($conn,$input_info);
        header("Location: ./list.php");
      }
    break;

    case 'comment_modify' :
      if(empty($_POST['title'])){
        header("Location: ./error.php?error=NotBlank");
      } else{
        $title=$_POST['title'];
        $description=$_POST['description'];
        $comment_id=$_POST['comment_id'];
        $input_Info="UPDATE comment SET title='$title', description='$description' WHERE comment_id='$comment_id'";
        mysqli_query($conn,$input_Info);
        header("Location: ./list.php");
        }
    break;

    case 'comment_delete' :
      if($_SESSION['userID']==$_POST['delete_user_ID']){
        $commentID=$_POST['comment_id'];
        $delete_Info="DELETE FROM comment WHERE comment_id={$commentID}";
        mysqli_query($conn,$delete_Info);
        header("Location: ./list.php");
      } else{
        header("Location: ./error.php?error=notAuthority");
      }
    break;
    case 'default' :
    break;
  }
?>