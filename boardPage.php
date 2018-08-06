<?php
 $link = mysqli_connect('localhost','root','123456','example','8081');

 if(!$link){
     echo 'DB접속 에러';
     echo mysqli_error($link);
     exit();
 }

 $query = "SELECT * FROM 'articles' ORDER BY 'id' DESC";

 $result = mysqli_fetch_assoc($link, $query);

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
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>글번호</th>
        <th>제목</th>
        <th>글쓴이</th>
        <th>날짜</th>
    </tr>
    </thead>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['writer'] ?></td>
            <td><?= $row['data'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
