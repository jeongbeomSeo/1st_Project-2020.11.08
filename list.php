<?php
include_once 'db.php';
include_once 'api.php';
include_once 'logincheck.php';

$result_user = mq("SELECT * FROM member");
$topic_list=mq("SELECT * FROM topic");
$comment_list=mq("SELECT * FROM comment");

if(!empty($_GET['id'])){
$select_topic="SELECT * FROM topic WHERE id={$_GET['id']}";
$topic_result=mq($select_topic);
$topic =mysqli_fetch_array($topic_result);
}
if(!empty($_GET['comment_id'])){
$select_comment="SELECT * FROM comment WHERE id={$_GET['comment_id']}";
$comment_result=mq($select_comment);
$comment=mysqli_fetch_array($comment_result);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시물</title>
  </head>
  <body>
    <form action="logout.php">
    <input type="submit" value="logOut">
    </form>
    <div>
      <nav>
        <ul>
          <?php
            while($row=mysqli_fetch_array($topic_list)){
              $mainTitle=$row['title'];
              $link = "./list.php?id={$row['id']}";?>
              <li><a href="<?=$link?>"><?=$mainTitle?></a></li>          <!--문장 문자열 분석 필요.-->                      
            <?php   
            } 
          ?>
        </ul>
        <ul>
          <a href="input.php">추가</a>
        </ul>
      </nav>
      <article>
        <div>
        <?php
          if(!empty($topic)){?>
            <div class='title'>
              <h2><?=$topic['title']?></h2>
            </div>
            <div class='description'>
              <p><?=$topic['description']?><p>
            </div>
            <a href="./modify.php?id=<?=$topic['id']?>">수정하기</a>
            <form action="./process.php?mode=delete" method="POST">
              <input type="hidden" name='id' value=<?=$topic['id']?>>
              <input type="hidden" name='delete_user_ID' value=<?=$topic['member_id']?>>
              <button type="submit">삭제하기</button><br /><br />
            </form>
            <ul>
                <h3>댓글 목록</h3><br /><?php
                  while($comment_row=mysqli_fetch_array($comment_list)){
                    if($topic['id'] == $comment_row['topic_id']){
                      $commentTitle=$comment_row['title'];
                      $link="./list.php?id={$topic['id']}&comment_id={$comment_row['id']}"; ?>
                      <li><a href=<?=$link?>><?=$comment_row['member_id']." : "."$commentTitle"?></a></li>
                      <?php
                    }
                  }
                ?>
            </ul>
            <ul>
              <form action="comment_input.php?id=<?=$topic['id']?>" method="POST">
                <button type="submit">댓글 달기</button>
              </form>
            </ul>  
          <?php
          }
          if(!empty($comment)){?>
            <div class ='comment'>
              <div class ='comment_headline'> 
                <h3>댓글창</h3>
              </div>
              <div class ='commnet_description'>
                <?=$comment['description']?>
              </div>
            </div>
            <a href="./comment_modify.php?id=<?=$topic['id']?>&comment_id=<?=$comment['id']?>">수정하기</a>
            <form action="./process.php?mode=comment_delete" method="POST">
              <input type="hidden" name='comment_id' value=<?=$comment['id']?>>
              <input type="hidden" name='delete_user_ID' value=<?=$comment['member_id']?>>
              <button type="submit">삭제하기</button><br /><br />
            </form>     
          <?php
          }
          ?>
        </div>
      </article>
    </div>
  </body>
</html>
