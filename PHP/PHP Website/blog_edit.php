<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';

$blog_id = $_GET['blog_id'];
$sql = "SELECT * FROM blogs WHERE blog_id=$blog_id";
$result = $connection->query( $sql);
echo $sql;
list( $blog_id, $title, $author, $blog_date, $content  ) = $result->fetch_row();
$submit = $_POST[ 'submit'];
if($submit){
    print_r( $_POST );
    print_r( $_GET );
    $title = $connection->real_escape_string($_POST['title']);
    $author = $connection->real_escape_string($_POST['author']);
    $blog_date = $connection->real_escape_string($_POST['blog_date']);
    $content = $connection->real_escape_string($_POST['content']);
    $submit = $_POST['submit'];

    $sql = "UPDATE 'php_articles' . 'blogs' SET title='$title', author='$author', blog_date='$blog_date', content='$content';";

    $result = $connection->query( $sql);
    if(!$results)
       die($db->error);
    //ob_clean();
    //header('Location: /blog.php');

}
$form =<<<END_OF_FORM
<div class='article' style="width:800px;">
<form method='POST' action='/blog_new.php'>
    Title:    &nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$title' name='title'><br/>
    Author: <input type='text' value='$author' name='author'><br/>
    Date:&nbsp; <input type='date' value='$blog_date' name='blog_date'><br/>
    Content: <textarea name='content' rows='10' cols='80'>$content</textarea></br>

    <input type='submit' value='Post' name='submit' ><br/>
</form>
</div>
END_OF_FORM;
echo $form;
require 'templates/footer.php';
ob_end_flush();