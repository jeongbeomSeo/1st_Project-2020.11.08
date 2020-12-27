<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>회원 가입</title>
    <link rel="stylesheet" href="./signup.css" type="text/css">
  </head>
  <body>
    <div id="signup">
      <a href="./index.html">돌아가기</a>
      <h1>
        회원 가입
      </h1>
    </div>
    <div id="signup_input">
      <form action="./process.php?mode=signup" method="POST">
        <div class="item_signup">아이디      : <input class="input_signup" type="text" name="member_id"><br /></div>
        <div class="item_signup">비밀번호    : <input class="input_signup" type="password" name="member_password"><br /></div>
        <div class="item_signup">이름        : <input class="input_signup" type="text" name="member_name"></div>  
        <button type="submit">제출</button>
      </form>
    </div>
  </body>
</html>