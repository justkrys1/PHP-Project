<?php

require "templates/dbconnect.php";
$sql = "Select email from users where newsletter is true";
$result = $connection->query( $sql);
while(list( $email )= $result->fetch_row()){

$subject = "Newletter from Pure Fishing";
$article_id = $_GET['article_id'];
$sql = "SELECT * FROM articles WHERE article_id=$article_id";
$result = $connection->query( $sql);

while(list( $article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at )= $result->fetch_row()){
    $message =  "Title: $title\n Author: $author\nContent: $article_text\nDate: $date_posted";

    $headers = "From: krys@purefishing.com." . "bcc: dave.jones@scc.spokane.edu" . "\r\n" ;
    mail( $email, $subject,$message, $headers );
}
}
mysqli_close($connection);

header('Location: /articles.php');
