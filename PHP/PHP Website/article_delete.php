<?php

$title = "Article Delete";
require 'templates/dbconnect.php';

$article_id = $_GET['article_id'];
$sql = "DELETE FROM articles WHERE article_id=$article_id";
$result = $connection->query( $sql);
$now = time();
header( 'Location: /articles.php?t=$now&msg="delete" ');  //redirect
mysqli_close($connection);