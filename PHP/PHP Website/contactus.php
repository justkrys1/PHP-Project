<?php
    require "templates/header.php";
?>
<header><h1>Contact Form</h1></header>

<?php
$title = "Contact Us";
require "templates/utilities.php";

$name = $_POST["name"];
$email = $_POST["email"];
$question = $_POST['question'];
$subscribe = isset($_POST["subscribe"]) ? 'checked="checked"' :'';
$selectedProduct = $_POST['products'];
$notify = isset($_POST["notify"]) ? 'checked="checked"' :'';

$contact = $_POST['contact'];
$email2 = ($contact == 'email') ? 'checked="checked"' :'';
$tel = ($contact == 'tel') ? 'checked="checked"' :'';


$form_submitted = $_POST["submit"];

if( isset( $form_submitted )){
    echo "Thanks for your submission!";

//////////////////////////////////////////////////////////////////////////////////////
    $to = 'justkrys1@yahoo.com';
    $subject = "Question from $name";
    $message = "Question: $question\n Product: $selectedProduct\n Newsletter: $subscribe;";
    $headers = "bcc: dave.jones@scc.spokane.edu" . "\r\n" ;
    mail( $to, $subject,$message, $headers );


    $subject = "Response from Pure Fishing";
    $message = 'Thankyou for your query. We will get back to you as soon as possible.';
    $headers = "From: krys@purefishing.com." . "\r\n" . "bcc: dave.jones@scc.spokane.edu" . "\r\n" ;
    mail( $email, $subject,$message, $headers );
    /////////////////////////////////////////////////////////////////////////////////////////

    if( empty ( $name )){
        $name_error = CreateErrorMsg("Please enter your name.");
    }
    if(empty ($email )){
        $email_error = CreateErrorMsg("Please enter your email.");
    }
}else{//Coming from a GET(URL)
    //Set default values here
    $subscribe = 'checked="checked"';
}

$products = ["None", "Rods", "Reels", "Tackle", "Clothing"];
$selectString = selectedOptions($products, $selectedProduct);
require('templates/contact_form.php');
echo $form;

?>

<?php
require "templates/footer.php";
?>