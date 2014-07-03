<?php
ob_start();
require "templates/header.php";
require "templates/dbconnect.php";

//$salt = 354684321364213546854321354103136546;
//$password .= $salt;

$username = $connection->real_escape_string($_POST['username']);
$password = $connection->real_escape_string(sha1($_POST['password']));
$admin = $connection->real_escape_string($_POST['admin']);
$newsletter = $connection->real_escape_string($_POST['newsletter']);
$submit = $_POST['submit'];


if(! empty($submit)){
    $sql = "SELECT * from users WHERE username='$username' AND password='$password';";
    $result = $connection->query($sql);
    list( $user_id, $username, $password, $admin, $newsletter ) = $result->fetch_row();

    if($admin){
        $_SESSION['admin'] = $admin;
        ob_clean();
        header("Location: /blog.php");
    } elseif($user_id){
        $_SESSION['username'] = $username;
        ob_clean();
        header("Location: /index.php");
    } else {
        echo "Your Username or Password are incorrect";
    }
}

echo <<< EndOfForm

    <form method='POST' actions='/login.php'>
        Username: <input type='text' size='20' name='username' value='$username'/><br/>
        Password: <input type='password' size='20' name='password' value='$password'/><br/><br/>
        <input type='submit' name='submit' value='Login'/>
    </form>
EndOfForm;


require "templates/footer.php";
?>
