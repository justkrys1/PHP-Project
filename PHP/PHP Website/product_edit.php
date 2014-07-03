<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';

$product_id = $_GET['product_id'];
$sql = "SELECT * FROM products WHERE product_id=$product_id";
$result = $connection->query( $sql);

list( $product_id, $name, $description, $price, $cost, $qty, $image  ) = $result->fetch_row();
$submit = $_POST[ 'submit'];
if($submit){
    print_r( $_POST );
    print_r( $_GET );
    $name = $connection->real_escape_string($_POST['name']);
    $description = $connection->real_escape_string($_POST['description']);
    $price = $connection->real_escape_string($_POST['price']);
    $cost = $connection->real_escape_string($_POST['cost']);
    $qty = $connection->real_escape_string($_POST['qty']);
    $image = $connection->real_escape_string($_POST['image']);
    $submit = $_POST['submit'];

    $sql = "UPDATE 'php_articles' . 'products' SET name='$name', description='$description', price='$price', cost='$cost', qty='$qty', image='image';";
    //echo $sql;
    $result = $connection->query( $sql);
    if(!$results)
        die($db->error);
    ob_clean();
    header( 'Location: /products.php' );

}
$form =<<<END_OF_FORM
<div class='article' style="width:800px;">
<form method='POST' action='/product_edit.php'>
    Name:    &nbsp;&nbsp;&nbsp;&nbsp;<input type= 'text' value='$name' name='name'><br/>
    Description: <input type='text' value= '$description' name='description'><br/>
    Price:&nbsp; <input type='text' value= '$price' name='price'><br/>
    Qty:&nbsp; <input type='text' value= '$qty' name='price'><br/>
    Image:&nbsp; <input type='text' value= '$image' name='price'><br/>

    <input type='submit' value='Post' name='submit' > <br/>
</form>
</div>
END_OF_FORM;
echo $form;
require 'templates/footer.php';
ob_end_flush();