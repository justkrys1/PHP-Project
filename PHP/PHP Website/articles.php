<?php
    require "templates/header.php";
?>
<header>
  <h1>Articles</h1>
</header>

<?php
require "templates/dbconnect.php";

$msg= $_GET['msg'];
if( $msg == 'delete')
    $msg = 'Successfully deleted.';
else
   $msg = '';

$sql = "SELECT * FROM articles";
$result = $connection->query( $sql);

if( ! empty($msg))
    echo '<div class="error">$msg</div>';

    echo "<a href='article_new.php'>Add New Article</a>";
echo "<table class='right2'><tr><th class='article'>ID</th><th class='article' >Article Title</th><th class='article' >Article Author</th><th class='article' >Article Content</th><th class='article'>Date Posted</th><th class='article'>Date Created</th><th class='article'>Last Modified</th>";
if( $_SESSION[ 'admin'])
    echo "<th class='article' colspan=4>Functions</th></tr>";
else
    echo "<th class='article' colspan=1>Show</th></tr>";

while(list( $article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at )= $result->fetch_row()){
    echo "<tr><td>$article_id</td>
           <td>$title</td>
           <td>$author</td>
           <td>$article_text</td>
           <td>$date_posted</td>
           <td>$created_at</td>
           <td>$modified_at</td>
           <td><a href='article_show.php?article_id=$article_id'>Show</a></td>";
           if( $_SESSION[ 'admin'])
            echo "<td><a href='article_edit.php?article_id=$article_id'>Edit</a></td>
            <td><a href='article_delete.php?article_id=$article_id''>Delete</a></td>
            <td><a href='article_email.php?article_id=$article_id'>Email</a></tr>";
}
echo "</table>";

mysqli_close($connection);
    require "templates/footer.php";
?>