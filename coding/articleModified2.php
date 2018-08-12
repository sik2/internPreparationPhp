<?php
    $id = $_POST['id'];
    $user = $_POST['user'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    $link = mysqli_connect('localhost','root','123456','homepage','3306');

    $query = "UPDATE `article` SET `user` = '{$user}',
                `title` = '{$title}',
                `body` = '{$body}'
                WHERE 
                `id` = {$id}";
    $result = mysqli_query($link,$query);

    if(empty($result)){
        echo mysqli_error($link);
        exit;
    }
    header("Location:/coding/articleView.php?id={$id}");

?>
