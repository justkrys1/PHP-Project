<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';
$submit = $_POST[ 'submit'];
$article_id = $_GET['article_id'];
$sql = "SELECT * FROM articles WHERE article_id=$article_id";
$result = $connection->query( $sql);

list( $article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at ) = $result->fetch_row();

if($submit){
    print_r( $_POST );
    print_r( $_GET );
    $title = $connection->real_escape_string($_POST['title']);
    $author = $connection->real_escape_string($_POST['author']);
    $article_text = $connection->real_escape_string($_POST['article_text']);
    $date_posted = $connection->real_escape_string($_POST['date_posted']);
    $created_at = $connection->real_escape_string($_POST['created_at']);
    $modified_at = $connection->real_escape_string($_POST['modified_at']);
    $submit = $_POST['submit'];
    $sql = "UPDATE 'php_articles' . 'articles' SET title='$title', author='$author', article_text='$article_text', date_posted='$date_posted', created_at='$created_at', modified_at='$modified_at';";
    $result = $connection->query( $sql);
    ob_clean();
    header('Location: /articles.php');

}

$form =<<<END_OF_FORM
<div class='article' style="width:800px;">
<form method='POST' action='/article_new.php'>
    Title:    &nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$title' name='title'><br/>
    Author: <input type='text' value='$author' name='author'><br/>
    Content: <textarea name='article_text' rows='10' cols='80'>$article_text</textarea></br>
    Date Posted:&nbsp; <input type='date' value='$date_posted' name='date_posted'><br/>
    Created On: &nbsp; <input type='date' value='$created_at' name='created_at'><br/>
    Modified On: <input type='date' value='$modified_at' name='modified_at'><br/>
    <input type='submit' value='Post' name='submit' ><br/>
</form>
</div>
END_OF_FORM;
echo $form;
require 'templates/footer.php';
ob_end_flush();