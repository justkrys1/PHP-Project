<?php
ob_start();
require 'templates/header.php';
require 'templates/dbconnect.php';

$title = $connection->real_escape_string($_POST['title']);
$author = $connection->real_escape_string($_POST['author']);
$article_text = $connection->real_escape_string($_POST['article_text']);
$date_posted = $connection->real_escape_string($_POST['date_posted']);
$created_at = $connection->real_escape_string($_POST['created_at']);
$modified_at = $connection->real_escape_string($_POST['modified_at']);
$submit = $_POST['submit'];

if($submit){
    $sql = "INSERT INTO `php_articles`.`articles` (`article_id`, `title`, `author`, `article_text`, `date_posted`, `created_at`, `modified_at`)
     VALUES (NULL, '$title', '$author', '$article_text', '$date_posted', '$created_at', '$modified_at');";
    $result = $connection->query( $sql);
    $new_id = $connection->insert_id;
    $message =  "Title: $title\n Author: $author\nContent: $article_text\nDate: $date_posted";
////////////////////////////////////////////////////////////////////////
     $sql = "Select email from users where newsletter is true";
     $result = $connection->query( $sql);
     while(list( $email )= $result->fetch_row()){

         $subject = "New Article from Pure Fishing";

         $headers = "From: krys@purefishing.com." . "\r\n" . "bcc: dave.jones@scc.spokane.edu" . "\r\n" ;
         mail( $email, $subject,$message, $headers );
     }
///////////////////////////////////////////////////////////////////////////////
    ob_clean();
    header('Location: /articles.php');

}

require 'templates/display_form.php';
require 'templates/footer.php';
ob_end_flush();