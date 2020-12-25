<?php
include_once 'db.php';
include_once 'api.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입 및 로그인</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
  </head>
  <body>
    <a href="./index.html">메인 화면</a>
    <div>
      <h1 class="login">로그인</h1>
      <div class="login_input">
        <form action="./login_ok.php" method="POST">
          <div class="item_id">ID : <input class="input_id" type="text" name="userID"><br /></div>
          <div class="item_password">PS : <input class="intpu_ps" type="password" name="userPassword"><br /></div>
          <div class="item_login_button"><button class="input_login" type="submit">로그인</button></div>
          <div class="item_link_singup"><a href="./signup.php">회원가입</a></div>
        </form>
      </div>
    </div>
  </body>
</html>
