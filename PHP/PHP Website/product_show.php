<?php
require "templates/header.php";
require 'templates/utilities.php';
require 'templates/dbconnect.php';

?>
    <header>
        <h1>Product Details:</h1>
    </header>
<?php

$product_id = $_GET['product_id'];
$sql = "SELECT AVG(rating) from reviews WHERE product_id=$product_id;";
$result = $connection->query( $sql);


list($average_rating) = $result->fetch_row();
$average_rating_stars = ratingStars( $average_rating );
$sql = "SELECT * from products WHERE product_id=$product_id";

$result = $connection->query( $sql);

list($product_id, $name, $description, $price, $cost, $qty, $image) = $result->fetch_row();
$display = <<<EndOfDisplay
    <a href='products.php'>Back to List</a>
    <div style='margin-left:150px;'>
    <h1><span class='fonts'>Rating:</span> $average_rating_stars</h1>
    <h1><span class='fonts'>Name:</span> $name</h1>
    <h2><span class='fonts'>Description:</span> $description</h2>
    <h2><span class='fonts'>Price:</span> $price</h2>
    <h2><span class='fonts'>Qty:</span> $qty</h2>
    <img src='$image' class='full' alt='Large'/></div>
    <br/><br/><br/><br/><br/><hr>
    <h2>Reviews:</h2>

EndOfDisplay;
echo $display;
////////////////////////////////////////////////////////////////////////////////////////////////////

$sql = "SELECT * from reviews WHERE product_id=$product_id";
$result = $connection->query( $sql);
while(list( $review_id, $name, $content, $date, $rating, $product_id )= $result->fetch_row()){
    $ago = ago( date('U', strtotime($date)) );
    $rating_stars = ratingStars( $rating );
    $show_review =<<< EndOfReview
<div class='comment'>
    <h3>$ago $name said: <br/>$content <br/>and rated it:<br/> $rating_stars</h3>
</div>

EndOfReview;
    echo $show_review;
}

if( $_SESSION[ 'username'])
    echo <<<EndOfReviewForm
<hr><h2>Add New Review:</h2>
    <div style="background-color:lightcyan; width:325px;border:1px solid black">
        <form action='new_review.php' method="POST">
            <input type="hidden" name="product_id" value="$product_id" />
            Name: &nbsp;<input type='text' name='name' size='40' /><br/>
            Content:<br/>
            <textarea name='content' rows='3' cols='37'></textarea><br/>
            Rating:&nbsp;
            <select name='rating'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
            </select><br/><br/>
            <input type='submit' name='submit' value = 'Submit'>
        </form>
    </div>
<a href='products.php'>Back to List</a>

EndOfReviewForm;
mysqli_close($connection);
require 'templates/footer.php';