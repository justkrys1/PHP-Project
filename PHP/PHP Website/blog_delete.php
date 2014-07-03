<?php
$title = "Blog Delete";
require 'templates/dbconnect.php';
$blog_id = $_GET['blog_id'];
$sql = "DELETE FROM comments WHERE blog_id=$blog_id";
$sql = "DELETE FROM blogs WHERE blog_id=$blog_id";
$result = $connection->query( $sql);
$now = time();
header( 'Location:/blog.php?t=$now&msg="delete"');//redirect
mysqli_close($connection);