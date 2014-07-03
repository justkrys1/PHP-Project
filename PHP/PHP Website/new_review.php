<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';

$product_id = $_POST['blog_id'];
$name = $_POST['name'];
$content = $_POST['comment'];
$rating = $_POST['rating'];
$submit = $_POST['submit'];

if($submit){
    $sql = "INSERT INTO 'php_articles' . 'reviews' ('review_id', 'name', 'content', 'date', 'rating', 'product_id')
     VALUES (NULL, '$name', '$content', NULL, '$rating', '$product_id');";
    echo $sql;
    $result = $connection->query( $sql);
    ob_clean();
    header('Location: /products.php?products_id=$products_id');
}

require 'templates/footer.php';
ob_end_flush();