<?php
$server ='localhost';
$username ='user_jb';
$password ='as46933036';
$database ='opentutorials';
$conn = mysqli_connect($server, $username, $password, $database);
$result_user = mysqli_query($conn,"SELECT * FROM member");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>회원가입 및 로그인</title>
        <body>
            <div>
                <h1>로그인</h1>
                    <div class="login">
                        <form action="./logincheck.php" method="POST">
                        ID : <input type="text" name="userID"><br>
                        PS : <input type="password" name="userPassword"><br>
                        <button type="submit">로그인</button>
                        </form>
                    </div>
                <div class="signup">
                    <a href="./signup.php">회원가입</a>        
                </div>
            </div>
        </body>
    </head>
</html>
