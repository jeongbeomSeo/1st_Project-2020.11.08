<?php
$server ='localhost';
$username ='user_jb';
$password ='as46933036';
$database ='opentutorials';
$conn = mysqli_connect($server, $username, $password, $database);

/*
while($row = mysqli_fetch_array($result_user)){       # 데이터 베이스에 회원 정보 담겨져 있는지 확인
    if($row['id'] === $_POST['id']){
        $stmt=true;                               <= 왜 안되는지 확인 !
        break;
    }
    else{   
        $stmt=false;
    }
}*/
$userID=$_POST['userID'];
$userPassword=$_POST['userPassword'];
$query="SELECT * FROM member WHERE member_id='$userID' and member_password='$userPassword' ";
$stmt=mysqli_query($conn,$query);
if($stmt === false){                               #로그인 체크변수를 토해서 session 실행 하거나 잘못된 입력 값 일경우 페이지 이동.
    header("Location: ./error.php?error=wronglogin");  #header(Location :) 에서 Location다음 띄어쓰기 금지!
} else if(mysqli_num_rows($stmt) === 0){
   header("Location: ./error.php?error=wronglogin");
} else {
    session_set_cookie_params(0,"/");
    session_start();
    $_SESSION['userID'] = $userID;
    $_SESSION['isLogged'] = 1;
    header("Location: ./list.php");
}
?>

