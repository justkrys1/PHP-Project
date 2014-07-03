<?php
session_start();
require "templates/header.php";
require "templates/dbconnect.php";
?>
<header>
    <h1>Blogs</h1>
</header>
<?php


$msg= $_GET['msg'];
if( $msg == 'delete')
    $msg = 'Successfully deleted.';
else
    $msg = '';

$sql = "SELECT * FROM blogs";
$result = $connection->query( $sql);

if( ! empty($msg))
    echo '<div class="error">$msg</div>';
    echo "<a href='blog_new.php'>Add New Blog</a>";
    echo "<table id='resizable' class='right2'><tr><th class='article'>ID</th><th class='article' >Title</th><th class='article' >Author</th><th class='article'>Date Posted</th><th class='article' >Content</th>";
if( $_SESSION[ 'admin'])
    echo "<th class='article' colspan=4>Functions</th></tr>";
else
    echo "<th class='article' colspan=1>Show</th></tr>";
while(list( $blog_id, $title, $author, $blog_date, $content )= $result->fetch_row()){
    echo "<tr><td>$blog_id</td>
       <td><a href='blog_show.php?blog_id=$blog_id'>$title</a></td>
       <td>$author</td>
       <td>$blog_date</td>
       <td>$content</td>
       <td><a href='blog_show.php?blog_id=$blog_id'>Show</a></td>";
    if( $_SESSION[ 'admin'])
       echo "<td><a href='blog_edit.php?blog_id=$blog_id'>Edit</a></td>
       <td><a href='blog_delete.php?blog_id=$blog_id''>Delete</a></td>";

}
echo "</tr></table>";

mysqli_close($connection);
require "templates/footer.php";
?>