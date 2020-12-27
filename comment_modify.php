<?php
include_once 'db.php';
include_once 'api.php';

$id=$_GET['id'];
$comment_id=$_GET['comment_id'];
$topic_list=mq("SELECT * FROM topic WHERE id='$id'");
$topic=mysqli_fetch_array($topic_list);
$comment_result=mq("SELECT * FROM comment WHERE id='$comment_id'");
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
          <div class ="text_caution">Not blank</div>
          <p>댓글 내용 :<textarea name='description' id='' value=<?=$comment['description']?> cols='30' rows='10'></textarea></p>
          <input type="hidden" name='comment_id' value=<?=$comment['id']?>>
          <button type="submit" >댓글 수정</button>
        </form>
        <?php 
      }
      ?>
      <?php
      if($_SESSION['userID'] != $comment['member_id']){
        error('notAuthority');
      }
      ?>
    </article>
  </body>
</html>