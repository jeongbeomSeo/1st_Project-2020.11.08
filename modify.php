<?php
session_start();
$server ='localhost';
$username ='user_jb';
$password ='as46933036';
$database ='opentutorials';
$conn = mysqli_connect($server, $username, $password, $database);
$topic_list=mysqli_query("SELECT * FROM topic WHERE id={$_GET['id']}");
$topic=mysqli_fetch_array($conn,$topic_list);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <title>게시물 수정</title>
    </head>
    <body>
    <div class="headline">
            <h1>게시물 수정</h1>
            </div>
            <article>
                <?php
                if($_SESSION['id']===$topic['member_id']){?>
                <form action="process.php?mode=modify" method="POST">
                    <p>게시물 제목 :<input type="text" name='title' value=<?=$topic['title']?>></p>
                    <p>게시물 내용 :<textarea name='description' id='' value=<?=$topic['description']?> cols='30' rows='10'></textarea></p>
                    <button type="submit" >게시물 작성</button>
                </form>
                <?php 
                }
                ?>
                <?php
                if($_SESSION['id']!==$topic['member_id']){
                    header("Location:./error.php?error=notAutority");
                }
                ?>
            </article>
    </body>
</html>