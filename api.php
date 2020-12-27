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
      error('notAuthority');
    }
  }

  function comment_input($title, $description, $topic_ID){
    if(empty($title)){
      error('notBlank');
    }
    else{
      $input_info="INSERT INTO comment (title, description, member_id, topic_id) VALUES('$title', '$description', '$_SESSION[userID]', '$topic_ID')";
      mq($input_info);
      header("Location:./list.php");
    }
  }

  function input($title, $description){
    if(empty($title)){
      error('notBlank');
    }
    else{
      $input_info="INSERT INTO topic (title, description, member_id) VALUES('$title', '$description', '$_SESSION[userID]')";
      mq($input_info);
      header("Location:./list.php");
    }
  }

  function modify($title, $description, $board_ID ,$table){
    if( empty($title)){
      error('wronglogin');
    }
    else{
      $input_info="UPDATE $table SET title='$title', description='$description' WHERE id='$board_ID'";
      mq($input_info);
      header("Location: ./list.php");
    }
  }
  
  function error($error_code){
    switch($error_code){
      case 'wronglogin':
        echo("<script>
        alert('아이디 또는 비밀번호를 틀리셨습니다.');
        history.back();
        </script>");
      break;

      case 'notAuthority':
        echo("<script>
        alert('권한이 없습니다.');
        history.back();
        </script>");
      break;

      case 'notBlank':
        echo("<script>
        alert('제목은 빈칸으로 두면 안됩니다.');
        history.back();
        </script>");
      break;

      case 'relogin':
        echo("<script>
        alert('로그인이 필요한 페이지입니다.');
        history.back();
        </script>");
      break;

      case 'defalut':
        echo("<script>
        alert('알 수 없는 오류입니다.');
        location.href='./index.html';
        </script>");
      break;
  }
}
?>