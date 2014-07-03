<?php
    require "templates/header.php";
    require 'templates/utilities.php';
    require 'templates/dbconnect.php';

?>
    <header>
        <h1>Blog Details:</h1>
    </header>
<?php

$blog_id = $_GET['blog_id'];
$sql = "SELECT AVG(rating) from comments WHERE blog_id=$blog_id;";
$result = $connection->query( $sql);


list($average_rating) = $result->fetch_row();
$average_rating_stars = ratingStars( $average_rating );
$sql = "SELECT * from blogs WHERE blog_id=$blog_id";

$result = $connection->query( $sql);

list($blog_id, $title, $author, $blog_date, $content) = $result->fetch_row();
$display = <<<EndOfDisplay
    <a href='blog.php'>Back to List</a>
    <h1><span class='fonts'>Rating:</span> $average_rating_stars</h1><br/>
    <h1><span class='fonts'>Title:</span> $title</h1>
    <h2><span class='fonts'>Date:</span> $blog_date</h2>
    <h2><span class='fonts'>Blog:</span></h2></div><br/><br/><br/>
    <div class='content'>$content -by $author</div><br/><br/><br/><br/><br/><hr>
    <h2>Comments:</h2>

EndOfDisplay;
echo $display;
////////////////////////////////////////////////////////////////////////////////////////////////////

$sql = "SELECT * from comments WHERE blog_id=$blog_id";
$result = $connection->query( $sql);
while(list( $comment_id, $name, $comment, $comment_date, $rating, $blogID )= $result->fetch_row()){
    $ago = ago( date('U', strtotime($comment_date)) );
    $rating_stars = ratingStars( $rating );
    $show_comment =<<< EndOfComment
<div class='comment'>
    <h3>$ago, $name said: <br/>$comment <br/>and rated it:<br/> $rating_stars</h3>
</div>

EndOfComment;
echo $show_comment;
}
if( $_SESSION[ 'username'])
echo <<<EndOfCommentForm
<hr><h2>Add New Comment:</h2>
    <div style="background-color:lightcyan; width:325px;border:1px solid black">
        <form action='new_comment.php' method="POST">
            <input type="hidden" name="blog_id" value="$blog_id" />
            Name: &nbsp;<input type='text' name='name' size='40' /><br/>
            Comment:<br/>
            <textarea name='comment' rows='3' cols='37'></textarea><br/>
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


EndOfCommentForm;
mysqli_close($connection);
require 'templates/footer.php';