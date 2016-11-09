<?php

include('login/login.php');
require_once("funkcie.php");

if (isset($_SESSION['login_user'])) {
    header('location: profile/profile.php');
}

if(isset($_POST['register'])){
    //echo "asad";
     $function->sendToUrl('registration/register.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>IIS Projekt</title>
</head>
<body>

    <h1>Welcome to IIS Projekt</h1>
    <div id=content>
        <div>
            <h2>Login Form</h2>
            <form action="<?php echo $function->GetSelf(); ?>" method="post">
                <label>Login :</label>
                <input id="name" name="login" placeholder="login" type="text">
                <label>Password :</label>
                <input id="password" name="password" placeholder="**********" type="password">
                <input name="submit" type="submit" value=" Login ">
                
            </form>
            <h2>Registration</h2>
            <form action="<?php echo $function->GetSelf(); ?>" method="post">
                <label>Registration:</label>
                <input type='submit' name='register' id='register' value='Registration'/>
            </form>
        </div>
    </div>
</body>
</html>