<?php
/**
 * Created by PhpStorm.
 * User: Sultan
 * Date: 28.10.2016
 * Time: 22:25
 */

include "connect_db.php";

$sql = "SELECT id, firstname, address FROM employee";

$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: ".$row["id"]." - name: ". $row["firstname"]." ". $row["address"]."<br>";
    }
} else {
    echo "0 results, buddy";
}

mysqli_close($link);
?>