<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>오류 발생</title>
        <body>
            <?php
                switch($_GET['error']){
                    case 'wronglogin':?>
                        잘못된 아이디 또는 패스워드를 입력하셨습니다 다시 입력해주세요.<br>
                        <a href="login.php">로그인 창</a>
                        <?php
                    break;

                    case 'notAuthority' :?>
                        해당 게시물에 권한이 없습니다.<br>
                        돌아가세요.<br>
                        <a href="list.php">돌아가기</a><?php
                    break;

                }
            ?>

        </body>
    </head>
</html>