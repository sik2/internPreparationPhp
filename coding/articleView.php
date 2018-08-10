<?php
    if(!isset($_GET['id'])){
        echo '잘못된 요청입니다.';
        exit;
    }
    $id = $_GET['id'];
    $link = mysqli_connect('localhost','root','123456','homepage','3306');
    if(!$link){
        echo "db접속 실패";
        echo mysqli_connect_error();
        exit;
    }

    $query = "SELECT * FROM `article` WHERE `id` = {$id}";

    $result = mysqli_query($link, $query);
    if (empty($result)){
        echo mysqli_error($link);
        exit;
    }
    $data = mysqli_fetch_assoc($result);
    if (empty($data)){
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
    <title><?=$data['title']?></title>
</head>
<body>
    <h1>제목<?=$data['title']?></h1>
    <h3>내용</h3>
    <p>글쓴이: <span><?=$data['user']?></span></p>
    <div>
        <?=$data['body']?>

    </div>
    <a href="articleModified.php?id=<?= $data['id'] ?>"><button>글수정</button></a>
    <a href="articleDelete.php?id=<?= $data['id'] ?>"><button>글삭제</button></a>
</body>
</html>
