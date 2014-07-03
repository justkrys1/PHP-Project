<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';

$title = $connection->real_escape_string($_POST['title']);
$author = $connection->real_escape_string($_POST['author']);
$blog_date = $connection->real_escape_string($_POST['blog_date']);
$content = $connection->real_escape_string($_POST['content']);
$submit = $_POST['submit'];

if($submit){
    $sql = "INSERT INTO `php_articles`.`blogs` (`blog_id`, `title`, `author`, `blog_date`, `content`)
     VALUES (NULL, '$title', '$author', '$blog_date', '$content');";
    $result = $connection->query( $sql);
    $new_id = $connection->insert_id;
    ob_clean();
    header('Location: /blog.php');

}

require 'templates/blog_form.php';
require 'templates/footer.php';
ob_end_flush();