<?php
// 사용자가 입력한 데이터를 가져온다.
$id = $_POST['id'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['passwordConfirmation'];
$email = $_POST['email'];

// DB에 접속한다.
$link = mysqli_connect('localhost', 'root', '123456', 'example', '8080');

if (!$link) {
    echo '서버 접속 오류<br/>';
    echo mysqli_connect_error(); // 접속 에러 메세지 출력
    exit;
}

// 사용자가 입력한 데이터 중, 아이디를 중복체크하기 위해 해당 아이디가 DB에 존재하는지 체크한다.
// 즉 해당 아이디로 SELECT 쿼리문을 구성한다.
$query1 = "SELECT `id` FROM `users` WHERE `id` = {$id}";

$result = mysqli_query($link, $query1);

$data = mysqli_fetch_assoc($result);

// $data의 값이 존재한다면 해당 id가 이미 존재한다는 뜻이다.
// 따라서 empty함수에 부정형을 붙여서 if문을 만든다.
// 즉, 비어있지 않으면 이라는 조건을 만든다.

// if 아이디가 DB에 존재하면
if (!empty($data)) {
    echo '이미 존재하는 아이디입니다.';
    exit;
}

// if 패스워드와 패스워드 확인이 다르면
if ($password !== $passwordConfirmation) {
    echo '비밀번호를 잘못 입력하셨습니다.';
    exit;
}

// 이메일 형식 체크는 구현하지 않는다.

// 사용자가 입력한 데이터를 DB에 저장한다.

$query2 = "INSERT INTO `users` (`id`, `password`, `email`) VALUES ('{$id}', '{$password}', '{$email}')";

$result = mysqli_query($link, $query2);

// 회원가입이 성공하면, 1개의 데이터가 들어갔으므로 $result에는 값이 1이 들어가 있어야 한다.
if ($result > 0) {
    // 메인 페이지로 리다이렉트
    header('Location: /');
} else {
    echo '서버오류';
}
?>
// 차후 수정
<!--if ($result > 0): ?>-->
<!--<!DOCTYPE html>-->
<!--<html lang="ko">-->
<!--<head>-->
<!--  <meta charset="UTF-8">-->
<!--  <title>회원가입 완료</title>-->
<!--</head>-->
<!--<body>-->
<!--  <script>-->
<!--    alert('회원가입이 완료되었습니다.')-->
<!--    location.href = '/'-->
<!--  </script>-->
<!--</body>-->
<!--</html>-->
<?php //else: ?>
<!--    echo '서버오류';-->
<?php //endif; ?>
