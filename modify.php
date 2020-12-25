<?php
include_once 'db.php';
include_once 'api.php';

$id=$_GET['id'];
$topic_list=mq("SELECT * FROM topic WHERE id='$id'");
$topic=mysqli_fetch_array($topic_list);
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
        if($_SESSION['userID']==$topic['member_id']){?>
          <form action="process.php?mode=modify" method="POST">
            <p>게시물 제목 :<input type="text" name='title' value=<?=$topic['title']?>></p>
            <div class ="text_caution">Not blank</div>
            <p>게시물 내용 :<textarea name='description' id='' value=<?=$topic['description']?> cols='30' rows='10'></textarea></p>
            <input type="hidden" name="topic_id" value=<?=$topic['id']?>>
            <button type="submit" >게시물 수정</button>
          </form>
        <?php 
        }
        if($_SESSION['userID'] !=$topic['member_id']){
          header("Location:./error.php?error=notAuthority");
        }
      ?>
    </article>
  </body>
</html>