<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){


    $link = mysqli_connect('localhost','root','123456','homepage','3306');

    if(!$link) {
        echo '서버접속에 실패했습니다.';
        echo mysqli_connect_error();
        exit;
    }

    $id = $_POST['id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `login` WHERE user = '{$id}'";
    $result = mysqli_query($link, $query);

    if(empty($result)){
        echo 'DB 오류';
        echo mysqli_error($link);
        exit;
    }
    $data = mysqli_fetch_assoc($result);
    if(empty($data)){
        echo'일치하는 아이디 값이 없습니다.';
        exit();
    }
    if($password !== $data['password']){
        echo '비밀번호가 다릅니다.';
        exit;
    }
    $_SESSION['login'] = true;

    echo "<script>alert('로그인 성공!')</script>";

    header("Location: index.php");
    }

?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>로그인 페이지</title>
</head>
<body>
    <form action="login.php" METHOD="POST">
        <label for="id">아이디</label>
        <input type="text" id="id" name="id"><br>
        <label for="password">비밀번호</label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="로그인하기">

    </form>

</body>
</html>
