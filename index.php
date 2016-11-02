<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--    <title>My Simple Form</title>-->
<!--</head>-->
<!--<body>-->
<!--    <form action="app/check.php" method="post">-->
<!--        <p>Name: <input name="name" type="text"></p>-->
<!--        <p>Email: <input name="email" type="text"></p>-->
<!---->
<!--        <p>Your message </br>-->
<!--            <textarea name="message" cols="30" rows="5"></textarea>-->
<!--        </p>-->
<!---->
<!--        <p><input type="submit" value="Send"></p>-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->

<?php

//include "db/connect_db.php";
include "db/print_table.php";

echo PHP_VERSION;

//$sql = "SELECT * FROM myCity";
//$result = mysqli_query($link,$sql) or die("Unable to select: ".mysql_error());
//print "<table>\n";
//while($row = mysqli_fetch_row($result)) {
//    print "<tr>\n";
//    foreach($row as $field) {
//        print "<td>$field</td>\n";
//    }
//    print "</tr>\n";
//}
//print "</table>\n";
//mysqli_close($link);


