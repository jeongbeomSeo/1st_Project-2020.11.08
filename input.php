<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>게시물 작성</title>
        <body>
            <div class="headline">
            <h1>게시물 작성</h1>
            </div>
            <article>
                <form action="process.php?mode=input" method="POST">
                    <p>게시물 제목 :<input type="text" name='title'></p>
                    <p>게시물 내용 :<textarea name='description' id='' cols='30' rows='10'></textarea></p>
                    <button type="submit" >게시물 작성</button>
                </form>
            </article>
        </body>
    </head>
</html>