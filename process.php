<?php
session_start();
$server ='localhost';
$username ='user_jb';
$password ='as46933036';
$database ='opentutorials';
$conn = mysqli_connect($server, $username, $password, $database);
$result_user = mysqli_query("SELECT * FROM member");

switch($_GET['mode']){
    case 'signup' :
        $member_id =$_POST['member_id'];
        $member_password =$_POST['member_password'];
        $member_name =$_POST['member_name'];
        $member_info="INSERT INTO member (member_id,member_password,member_name) VALUES('$member_id','$member_password','$member_name')";
        $member_result=mysqli_query($conn,$member_info);
        if($member_result){
            header("Location: login.php");
        }else {
            echo "failed to register";
        }
    break;

    case 'input' :
        $title=$_POST['title'];
        $description=$_POST['description'];
        $member_id=$_SESSION['id'];
        $input_Info="INSERT INTO topic (title,description,member_id) VALUES('$title','$description',$member_id)";
        $topic_input=mysqli_query($conn,$input_Info);
        header("Location: ./list.php");
    break;

    case 'delete' :
        if($_SESSION['id']===$_POST['member_id']){
            $topicID=$_POST['id'];
            $delete_Info="DELETE FROM topic WHERE id=$topicID";
            mysqli_query($conn,$delete_Info);
            header("Location: ./list.php");
        } else{
            header("Location: ./error.php?error=notAutority");
        }
    case 'modify' :
        if($_SESSION['id']===$_POST['member_id']){
        $title=$_POST['title'];
        $description=$_POST['description'];
        $member_id=$_SESSION['id'];
        $input_Info="INSERT INTO topic (title,description,member_id) VALUES('$title','$description',$member_id)";
        }

}

?>