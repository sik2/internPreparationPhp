<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $link = mysqli_connect('localhost','root','123456','homepage','3306');
        if(!$link){
            echo 'db접속 실패!';
            echo mysqli_connect_error();
            exit;
        }
        $user = $_POST['user'];
        $title = $_POST['title'];
        $body = $_POST['body'];
        $query =  "INSERT INTO `article`(`user`,`title`,`body`) VALUES ('{$user}','{$title}','{$body}')";

        $result = mysqli_query($link,$query);
        if(empty($result)){
            echo '쿼리전송실패';
            echo mysqli_error($link);
            exit;
        }
        header("Location:articleContents.php");
    }


?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<form action="articleCreate.php" method="post">
    <label for="user">글쓴이</label>
    <input type="text" id="user" name="user"><br>
    <label for="user">제목</label>
    <input type="text" id="title" name="title"><br>
    <label for="user">내용</label><br>
    <textarea name="body" rows = "10" cols="30"></textarea><br>
    <input type="submit" value="글쓰기">
</form>
</body>
</html>
