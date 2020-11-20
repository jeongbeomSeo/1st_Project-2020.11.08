<?php
$server ='localhost';
$username ='user_jb';
$password ='as46933036';
$database ='opentutorials';
$conn = mysqli_connect($server, $username, $password, $database);
$result_user = mysqli_query($conn,"SELECT * FROM member");
$topic_list=mysqli_query($conn,"SELECT * FROM topic");
session_start();

if(!isset($_SESSION['isLogged'])) {
echo "<script>alert('로그인이 필요한 서비스 입니다.');</script>";
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
exit;
}

if(!empty($_GET['id'])){
$select_topic="SELECT * FROM topic WHERE id={$_GET['id']}";
$topic_result=mysqli_query($conn,$select_topic);
$topic =mysqli_fetch_array($topic_result);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>게시물</title>
        <div>
            <nav>
                <ul>
                    <?php
                        while($row=mysqli_fetch_array($topic_list)){
                            $mainTitle=$row['title'];
                            $link = "list.php?id={$row['id']}";?>
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
                            <form action="process.php?mode=delete" method="POST">
                                <input type="hidden" name='id' value=<?=$topic['id']?>>
                                <input type="hidden" name='membe    r_id' value=<?=$topic['member_id']?>>
                                <button type="text">삭제하기</button><br><br>
                            </form>
                            <?php
                        }
                    ?>
                        <form action="logout.php">
                            <input type="submit" value="logOut">
                        </form>
                </div>
            </article>
            
        </div>
    </head>
    <body>
        
    </body>
</html>
