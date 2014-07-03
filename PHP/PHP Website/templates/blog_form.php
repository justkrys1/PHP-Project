<?php
$form =<<<END_OF_FORM
<div class='article' style="width:800px;">
<form method='POST' action='/blog_new.php'>
    Title:    &nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$title' name='title'><br/>
    Author: <input type='text' value='$author' name='author'><br/>
    Date:&nbsp; <input type='date' value='$blog_date' name='blog_date'><br/>
    Content: <textarea name='content' rows='10' cols='80'>$content</textarea></br>

    <input type='submit' value='Post' name='Submit' ><br/>
</form>
</div>
END_OF_FORM;
echo $form;
