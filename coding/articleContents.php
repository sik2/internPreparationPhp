<?php


    $link = mysqli_connect('localhost','root','123456','homepage','3306');

    if(!$link){
        echo 'db접속 실패!';
        echo mysqli_connect_error();
        exit;
    }
    $query = "SELECT * FROM `article` ORDER BY `id` DESC";

    $result = mysqli_query($link, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시판</title>

</head>
    <body>
    <table>
        <thead>
        <tr>
            <td>글번호</td>
            <td>글쓴이</td>
            <td>제목</td>
            <td>내용</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><a href="articleView.php?id=<?=$row['id']?>"><?= $row['id'] ?></a></td>
            <td><?= $row['user'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['body'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="articleCreate.php"><button>글쓰기</button>



    </body>
</html>
