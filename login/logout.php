<?php
    require_once("../util_functions.php");
    session_start();

    // User has logged out,
    if(session_destroy()) {
        // redirecting..
        $util_functions->sendToUrl('../index.php');
    }
?>