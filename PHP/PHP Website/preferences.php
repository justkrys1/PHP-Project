<?php
require "templates/header.php";
?>
<header><h1>To receive our newsletter:</h1></header>

<?php
$title = "Preferences";
require "templates/utilities.php";



$form = <<<EndOfForm
<form method="POST" action="/preferences.php">
    <table id ='preferences'>

        <tr>
            <td><label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="$first_name" id='first_name' />$name_error</td>
        </tr>

        <tr>
            <td><label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="$last_name" id='last_name' />$name_error</td>
        </tr>

        <tr>
            <td><label for="email">Email Address :</label>&nbsp;
            <input type="email" name="email" value="$email" id='email' >$email_error</td>
        </tr>

        <tr><td><input type='checkbox' id='newsletter' name='newsletter' value='yes' $newsletter >
            <label for="checkbox">Subscribe to Newsletter?</label></td>
        </tr>

        <tr>
            <td><input type="submit" name="submit" value="submit" ></td>
        </tr>
    </table>
</form>
</section>
EndOfForm;
echo $form;
$first_name = $connection->real_escape_string($_POST['first_name']);
$last_name = $connection->real_escape_string($_POST['last_name']);
$email = $connection->real_escape_string($_POST['email']);
$newsletter = isset($_POST["newsletter"]) ? 'checked="checked"' :'';
$form_submitted = $_POST["submit"];

if( isset( $form_submitted )){
    $sql = "UPDATE 'users' SET first_name='$first_name', last_name='$last_name', email='$email', newsletter='$newsletter' WHERE email=$email;";
    $result = $connection->query( $sql);
    $new_id = $connection->insert_id;
    ob_clean();
    header('Location: /index.php');

    $to = 'me';
    $subject = 'Question from : $name';
    $message = '$question\nSelectedProduct\n$subscribe';
    $headers = 'bcc: davejones@something' . '\r\n';

    mail( $to, $subject, $message, $headers );
    mail( $email, 'Thankyou for your query. We will get back to you as soon as possible.', $message );

    if( empty ( $username )){
        $name_error = CreateErrorMsg("Please enter your username.");
    }
    if( empty ( $name )){
        $name_error = CreateErrorMsg("Please enter your name.");
    }
    if(empty ($email )){
        $email_error = CreateErrorMsg("Please enter your email.");
    }
}else{
    $newsletter = 'checked="checked"';
}
require "templates/footer.php";
?>