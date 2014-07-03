<?php
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