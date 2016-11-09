<?php
/**
 * Created by PhpStorm.
 * User: Sultan
 * Date: 2/11/2016
 * Time: 22:28 PM
 */
$dir = getcwd();
include($dir.'/db/config.php');
$error = '';

session_start();

if (isset($_POST['submit'])) {
    if(empty($_POST['login']) || empty($_POST['password'])) {
        $error = "Login and/or password is invalid";
    } else {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = stripslashes($login);
        $password = stripslashes($password);
        $login = mysql_real_escape_string($login, $link);
        $password = mysql_real_escape_string($password, $link);

        $_sql = "SELECT * from employee where password='$password' AND login='$login'" or die(mysql_error());;
        $query = mysql_query($_sql, $link);

        if (mysql_num_rows($query) > 0) {
            $_SESSION['login_user'] = $login;
            header("location: ../profile/profile.php");
        } else {
            $error = "Login and/or password is invalid";
        }
        mysql_close($link);
    }
}
?>