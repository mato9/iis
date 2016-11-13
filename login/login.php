<?php
/**
 * Created by PhpStorm.
 * User: Sultan
 * Date: 2/11/2016
 * Time: 22:28 PM
 */
$dir = getcwd();
require_once($dir.'../util_functions.php');
//$util_functions = new get_function();
$link = $util_functions->getLink();

$error = '';
session_start();

// User has submitted a form
if (isset($_POST['submit'])) {

    // Simple input data check
    if(empty($_POST['login']) || empty($_POST['password'])) {
        $error = "Login and/or password is invalid";
    } else {
        // Getting input data
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Black magic with input data
        $login = stripslashes($login);
        $password = stripslashes($password);
        $login = $link->escape($login);
        $password = $link->escape($password);

        // Performing a SQL query
        $_sql = "SELECT * from employee WHERE password='$password' AND login='$login'";
        $query = $link->db_query($_sql);

        // Getting result
        if (mysqli_num_rows($query) > 0) {
            // Success, redirecting
            $_SESSION['login_user'] = $login;
            header("location: ../profile/profile.php");
        } else {
            // Error has occur
            $error = "Login and/or password is invalid";
        }
    }
}
?>