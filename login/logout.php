<?php
/**
 * Created by PhpStorm.
 * User: Sultan
 * Date: 2/11/2016
 * Time: 22:29 PM
 */

session_start();
if(session_destroy()) {
    header("location: ../index.php");
}
?>