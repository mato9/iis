<?php

include('login/login.php');
require_once('util_functions.php');
//$util_functions = new get_function();
// User is already logged, showing him his profile
if (isset($_SESSION['login_user'])) {
    $util_functions->sendToUrl('profile/profile.php');
}

// User has clicked the registration button, redirecting to registration page
if (isset($_POST['register'])) {
     $util_functions->sendToUrl('registration/register.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>RESIS - restauracni IS</title>
</head>
<body>

    <h1>Welcome to IIS Projekt</h1>
    <div id=content>
        <div>
            <h2>Login Form</h2>
            <form action="<?php echo $util_functions->getSelf(); ?>" method="post">
                <label>Login :</label>
                <input id="name" name="login" placeholder="login" type="text">
                <label>Password :</label>
                <input id="password" name="password" placeholder="**********" type="password">
                <input name="submit" type="submit" value="Login">
                
            </form>
            <h2>Registration</h2>
            <form action="<?php echo $util_functions->getSelf(); ?>" method="post">
                <label>Registration:</label>
                <input type='submit' name='register' id='register' value='Registration'/>
            </form>
        </div>
    </div>
</body>
</html>