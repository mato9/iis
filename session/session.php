<?php
/**
 * Created by PhpStorm.
 * User: Sultan
 * Date: 2/11/2016
 * Time: 22:16 PM
 */

include('../db/config.php');

session_start();

$user_check = $_SESSION['login_user'];

$_sql = "SELECT login from employee WHERE login = '$user_check'";

$session_sql = mysql_query($_sql, $link);
$row = mysql_fetch_array($session_sql, MYSQLI_ASSOC);

if (isset($_SESSION['login'])) {
        $login_session = $row['login'];
}

if(!isset($_SESSION['login_user'])){
    header("location: ../index.php");
}
?>
