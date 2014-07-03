<?php
$title = "Product Delete";
require 'templates/dbconnect.php';
$product_id = $_GET['product_id'];
$sql = "DELETE FROM reviews WHERE product_id=$product_id";
$sql = "DELETE FROM products WHERE product_id=$product_id";
$result = $connection->query( $sql);
$now = time();
header( 'Location:/products.php?t=$now&msg="delete"');//redirect
mysqli_close($connection);