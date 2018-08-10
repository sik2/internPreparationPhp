<?php
    if(!isset($_GET['id'])) {
        echo '잘못된 요청입니다.';
        exit;
    }
    $link = mysqli_connect('localhost','root','123456','homepage','3306');
    if((!$link)){
        echo 'DB접속 실패!';
        echo mysqli_connect_error();
        exit;
    }
    $query = "SELECT * FROM `article` WHERE `id` = {$_GET['id']}";
    $result = mysqli_query($link,$query);

    if(empty($result)){
        echo mysqli_error($link);
        exit;
    }
    $data = mysqli_fetch_assoc($result);

    if(empty($data)) {
        echo '존재하지 않는 게시글입니다.';
        exit;
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
    <input type="text" id="user" name="user" value="<?= $data['user']?>"><br>
    <label for="user">제목</label>
    <input type="text" id="title" name="title" value="<?= $data['title']?>"><br>
    <label for="user">내용</label><br>
    <textarea name="body" id="body" rows = "10" cols="30" ><?= $data['body']?></textarea><br>
    <input type="submit" value="수정하기">
</form>
</body>
</html>



<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $user = $_POST['user'];
        $title = $_POST['title'];
        $body = $_POST['body'];

        $query = "UPDATE `article` SET `writer` = '{$writer}',`title` = '{$title}',`body` = '{$body}'WHERE `id` = {$id}";
        $result = mysqli_query($query);

    if(empty($result)){
        echo mysqli_error($link);
        exit;
        }
        header("Location:/view.php?id={$id}");
    }

?>

