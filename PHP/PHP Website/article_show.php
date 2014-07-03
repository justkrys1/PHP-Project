<?php
    require "templates/header.php";
?>
<header>
    <h1>Article Details</h1>
</header>
<?php
require 'templates/dbconnect.php';
$article_id = $_GET['article_id'];
$sql = "SELECT * from articles WHERE article_id=$article_id";
$result = $connection->query( $sql);

list($article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at) = $result->fetch_row();

$display = <<<EndOfDisplay
<div class='show'>
    <a href='articles.php'>Back to List</a>
    <h1><span class='fonts'>Title:</span> $title</h1>
    <h2><span class='fonts'>Created On:</span> $created_at</h2>
    <h2><span class='fonts'>Publish Date:</span> $date_posted</h2>
    <h2><span class='fonts'>Modified On:</span>  $modified_at</h2>
    <h2><span class='fonts'>Article:</span></h2></div><br/><br/><br/>
    <div class='content'>$article_text -by $author</div>


EndOfDisplay;
echo $display;
////////////////////////////////////////////////////////////////////////////////////////////////////
/*$sql = "SELECT * from comments WHERE article_id=$article_id";
$result = $connection->query( $sql);
while(list( $comment_id, ,$title, $author, $content, $blog_date, $blogID )= $result->fetch_row()
    $comment =<<< EndOfComment
<div class="comment">
    <h2>$title</h2>
    <h3>$author</h3>
    <h3>$blog_date</h3>
    <p>$content</p>
</div>
EndOfComment;
echo $comment;
}
echo <<<EndOfCommentForm
    <div>
        <form action='new_comment.php' method="POST">
        <input type="hidden" name="article_id" value="$article_id">
            <input type='text' name='title' size='40' /><br/>
            <input type='text' name='author' size='40' /><br/>
            <input type='textarea' name='content' rows='3' cols='40'></textarea>
            <input type='submit name=submit value = 'submit'>
            </form>
    </div>


EndOfCommentForm;*/


mysqli_close($connection);
require 'templates/footer.php';