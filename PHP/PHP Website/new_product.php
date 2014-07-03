<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';

$name = $connection->real_escape_string($_POST['name']);
$description = $connection->real_escape_string($_POST['description']);
$price = $connection->real_escape_string($_POST['price']);
$cost = $connection->real_escape_string($_POST['cost']);
$qty = $connection->real_escape_string($_POST['qty']);
$image = $connection->real_escape_string($_POST['image']);
$submit = $_POST['submit'];

if($submit){
    $sql = "INSERT INTO 'php_articles'.'products' ('product_id', 'name', 'description', 'price', 'cost','qty', 'image' )
     VALUES (NULL, '$name', '$description', '$price', '$cost', '$qty', '$image');";
    $result = $connection->query( $sql);
    $new_id = $connection->insert_id;
    //ob_clean();
    //header('Location: /products.php');

}
echo 'sql:' . $sql;
$form =<<<END_OF_FORM
<div class='article' style="width:800px;">
<form method='POST' action='/new_product.php'>
    Name:    &nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$name' name='name'><br/>
    Description: <input type='text' value='$description' name='description'><br/>
    Price:&nbsp; <input type='text' value='$price' name='price'><br/>
    Cost:&nbsp; <input type='text' value='$cost' name='qty'><br/>
    Qty:&nbsp; <input type='number' value='$qty' name='qty'><br/>
    Image:&nbsp; <input type='text' value='$image' name='price'><br/>
    <input type='submit' value='Submit' name='submit' ><br/>
</form>
</div>
END_OF_FORM;
echo $form;

require 'templates/footer.php';
ob_end_flush();