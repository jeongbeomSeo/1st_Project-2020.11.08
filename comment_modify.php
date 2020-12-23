<?php
session_start();
$server ='localhost';
$username ='user_jb';
$password ='as46933036';
$database ='opentutorials';
$conn = mysqli_connect($server, $username, $password, $database);
$id=$_GET['id'];
$comment_id=$_GET['comment_id'];
$topic_list=mysqli_query($conn,"SELECT * FROM topic WHERE id='$id'");
$topic=mysqli_fetch_array($topic_list);
$comment_result=mysqli_query($conn,"SELECT * FROM comment WHERE comment_id='$comment_id'");
$comment=mysqli_fetch_array($comment_result);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <title>댓글 수정</title>
    </head>
    <body>
    <div class="headline">
            <h1>댓글 수정</h1>
            </div>
            <article>
                <?php
                if($_SESSION['userID']==$comment['member_id']){?>
                <form action="process.php?mode=comment_modify" method="POST">
                    <p>댓글 제목 :<input type="text" name='title' value=<?=$comment['title']?>></p>
                    <p>댓글 내용 :<textarea name='description' id='' value=<?=$comment['description']?> cols='30' rows='10'></textarea></p>
                    <input type="hidden" name='comment_id' value=<?=$comment['comment_id']?>>
                    <button type="submit" >댓글 수정</button>
                </form>
                <?php 
                }
                ?>
                <?php
                if($_SESSION['userID'] != $comment['member_id']){
                    header("Location:./error.php?error=notAuthority");
                }
                ?>
            </article>
    </body>
</html>