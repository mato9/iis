<?php
/**
 * Created by PhpStorm.
 * User: Sultan
 * Date: 28.10.2016
 * Time: 18:39
 */

//$hostname = "localhost:/var/run/mysql/mysql.sock";
$hostname = "localhost";
$database = "xzhant00";
//$username = "xzhant00";
//$password = "ca2bunve";

$username = "root";
$password = "";

$link = mysqli_connect($hostname, $username, $password);
if (!$link) die('nelze se pripojit '.mysqli_error());

echo "Connected successfully"."<br />";

$sql = "USE xzhant00";

if($link->query($sql) === TRUE) {
    echo "USE db success"."<br />";
} else {
    echo "Error creating table: ".$link->error."<br />";
}

//$res = mysqli_query($link, "CREATE TEMPORARY TABLE myCity LIKE City");