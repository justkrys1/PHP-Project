<nav>
<ul id="nav">
    <li><a href="/index.php">Home</a></li>
    <li><a href="/products.php">Products</a></li>
    <li><a href="/aboutus.php">About Us</a></li>
    <li><a href="/contactus.php">Contact Us</a></li>
    <li><a href="/articles.php">Articles</a></li>
    <li><a href="/blog.php">Blogs</a></li>
    <li><a href="/calendar.php">Calendar</a></li>

    <?php
        if(( $_SESSION[ 'username']) || ( $_SESSION[ 'admin']))
            echo '<li><a href="/preferences.php">Preferences</a></li>
            <li><a href="/logout.php">Logout</a></li>';
        else
            echo '<li><a href="/login.php">Login</a></li>';
    ?>


</ul>
</nav>
&nbsp; &nbsp;
