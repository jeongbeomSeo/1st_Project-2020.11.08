<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>회원 가입</title>
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div>
      <a href="./index.html">돌아가기</a>
    </div>
    <div>
      <form action="./process.php?mode=signup" method="POST">
        아이디      : <input type="text" name="member_id"><br />
        비밀번호    : <input type="password" name="member_password"><br />
        이름        : <input type="text" name="member_name">  
        <button type="submit">제출</button>
      </form>
    </div>
  </body>
</html>