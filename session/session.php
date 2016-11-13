<?php

    require_once("../util_functions.php");
    session_start();
    $link = $util_functions->getLink();
    $user_check = $_SESSION['login_user'];

    // Escaping SQL query
    $sql = "SELECT login from employee WHERE login = '$user_check'";

    // Trying to perform a query
    $session_sql = $link->db_query($sql);
    // Fetching results
    $row = mysqli_fetch_array($session_sql, MYSQLI_ASSOC);

    if (isset($_SESSION['login'])) {
            $login_session = $row['login'];
    }

    if(!isset($_SESSION['login_user'])){
        $util_functions->sendToUrl('../index.php');
    }
?>
