
</section>


<ul class="breadcrumbs">
	<li><a href="/index.php">Home>></a></li>
	<li><a href="/products.php">Products>></a></li>
	<li><a href="/aboutus.php">About Us>></a></li>
	<li><a href="/contactus.php">Contact Us>></a></li>
	<li><a href="/articles.php">Articles>></a></li>
	<li><a href="/blog.php">Blog>></a></li>
	<li><a href="/calendar.php">Calendar>></a></li>
    <li><a href="/preferences.php">Preferences</a></li>
    <?php
    if( $_SESSION[ 'username'])
        echo '<li><a href="/logout.php">Logout>></a></li>';
    else
        echo '<li><a href="/login.php">Login>></a></li>';
    ?>

    <li><footer>Pure Fishing/Copyright 2013/Legal Stuff/Privacy Policy</footer></li>
</ul>

</body>
</html>