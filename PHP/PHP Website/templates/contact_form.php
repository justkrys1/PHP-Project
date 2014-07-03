
<?php

$form = <<<EndOfForm
    <form method="POST" action="/contactus.php">
<table>
  <tr> <td>     <br/><label for="name">Your Full Name:</label>
        <input type="text" name="name" value="$name" id='name' />$name_error<br/><br/></td></tr>

    <tr><td>    <label for="email">Email Address :</label>&nbsp;
        <input type="email" name="email" value="$email" id='email' >$email_error<br/><br/></td></tr>

   <tr><td>     <label for="tel">Phone Number :</label>
        <input type="tel" name="tel" value="$tel" id='email2' ><br/><br/></td></tr>
 <tr><td>       <aside>Products Interested In: $selectString</aside><br/></td></tr>


 <tr><td>       <input type='checkbox' id='subscribe' name='subscribe' value='yes' $subscribe >
        <label for="checkbox">Subscribe to Newsletter?</label><br/></td></tr>

 <tr><td>       <input type='checkbox' id='notify' name='notify' value='yes' $notify >
        <label for='notify'>Notify me when new products are added</label><br/><br/>

 <tr><td>       <label for='contact'>Please contact me by: </label><br/>
       <input type="radio" name="contact" value="email2" $email2 > Email <br/>
      <input type="radio" name="contact" value="phone" $phone > Phone <br/><br/></td></tr>

  <tr><td>      <label for="question">Questions/Comments: </label><br/>
<textarea rows="10" cols="50" id='question' name = "question">$question</textarea></td></tr>

  <tr><td>      <input type="submit" name="submit" value="submit" ></td></tr>

</table>
</form>

EndOfForm;

?>