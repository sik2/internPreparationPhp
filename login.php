<?php
$link = mysqli_connect('localhost','root','123456','login');

if(!$link){
    echo "<script>alert('서버접속에 실패했습니다.');</script>";
    echo mysqli_connect_error();
    exit;
}
$id = $_POST['id'];
$password = $_POST['password'];

$query = "SELECT * FROM userinform WHERE id = '{$id}'";

$result = mysqli_query($link,$query);

if (empty($result)){
    echo "<script>alert('DB 접속 오류');</script>";
    echo (mysqli_connect_error($link));
    exit;
}

$data = mysqli_fetch_assoc($result);

// 만일 데이터가 존재하지 않으면 fasle값이 리턴된다.
if (empty($data)) {
    echo "<script>alert('존재하지 않는 회원 입니다.');history.back();</script>";
    exit;
}
if ($password !== $data['password']){
    echo "<script>alert('비밀번호가 틀렸습니다.'); history.back();</script>";
    exit;
}
echo "<script>alert('로그인 성공!');location.replace('index.php');
            </script>";

?>




