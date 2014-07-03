<?php
session_start();
require "templates/header.php";
require "templates/dbconnect.php";
?>
    <header>
        <h1>Products</h1>
    </header>
<?php


$msg= $_GET['msg'];
if( $msg == 'delete')
    $msg = 'Successfully deleted.';
else
    $msg = '';

$sql = "SELECT * FROM products";
$result = $connection->query( $sql);

if( ! empty($msg))
    echo '<div class="error">$msg</div>';
if( $_SESSION[ 'admin']){
    echo "<a href='new_product.php'>Add New Product</a>";
    echo "<table id='resizable' style='margin_left: 150px;' ><tr><th class='article'>Item No.</th><th class='article'>Name</th><th class='article' >Description</th><th class='article' >Price</th><th class='article' >Cost</th><th class='article'>Qty</th><th class='article'>Image</th><th class='article' colspan=3>Functions</th>";
} else
{
    echo "<table id='resizable' style='margin_left: 150px;'><tr><th class='article'>Item No.</th><th class='article'>Name</th><th class='article' >Description</th><th class='article' >Price</th><th class='article'>In Stock</th><th class='article'>Image</th><th class='article'>Show</th>";
}

while(list( $product_id, $name, $description, $price, $cost, $qty, $image )= $result->fetch_row()){
    echo "<tr><td>$product_id</td>
       <td><a href='product_show.php?product_id=$product_id'>$name</a></td>
       <td>$description</td>
       <td>$price</td>";
        if($_SESSION['admin'])
            echo "<td>$cost</td>";
        echo "<td>$qty</td>
       <td><img src='$image' class='thumb' alt='Thumbnail' /></td>
       <td><a href='product_show.php?product_id=$product_id'>Show</a></td>";
    if( $_SESSION[ 'admin'])
        echo "<td><a href='product_edit.php?product_id=$product_id'>Edit</a></td>
       <td><a href='product_delete.php?product_id=$product_id'>Delete</a></td>";

}
echo "</tr></table>";

mysqli_close($connection);
require "templates/footer.php";
?>