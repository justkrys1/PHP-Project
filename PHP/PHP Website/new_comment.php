<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';

$blog_id = $_POST['blog_id'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];
$submit = $_POST['submit'];

if($submit){
    $sql = "INSERT INTO 'php_articles' . 'comments' ('comment_id', 'name', 'comment', 'comment_date', 'rating', 'blog_id')
     VALUES (NULL, '$name', '$comment', NULL, '$rating', '$blog_id');";
    echo $sql;
    $result = $connection->query( $sql);
    ob_clean();
    header('Location: /blog.php?blog_id=$blog_id');
}

require 'templates/footer.php';
ob_end_flush();