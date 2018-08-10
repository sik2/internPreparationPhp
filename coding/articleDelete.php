<?php
    if (!isset($_GET['id'])){
        echo '잘못된 요청입니다.';
        exit;
    }

    $link = mysqli_connect('localhost','root','123456','homepage','3306');

    if(!$link){
        echo 'db접속 실패';
        echo mysqli_connect_error();
        exit;
    }

    $query = "DELETE FROM `article` WHERE `id` = {$_GET['id']}";
    $result = mysqli_query($link,$query);

    if (empty($result)){
       echo mysqli_error($link);
       exit;
    }
    $affectedRow = mysqli_affected_rows($link);

    if($affectedRow !==1){
        echo '삭제 실패';
        exit;
    }
    header("Location:articleContents.php")
?>