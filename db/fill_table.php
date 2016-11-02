<?php
/**
 * Created by PhpStorm.
 * User: Sultan
 * Date: 28.10.2016
 * Time: 22:26
 */

include "connect_db.php";

$sql = "INSERT INTO employee (id, login, password, firstname, lastname, birthdate, contract_from_date, contract_to_date, address, phone) 
VALUES('', 'xzhant00', 'heslo1', 'Sultan', 'Zhantemirov', '1111-11-11', '0000-00-00', '0000-00-00', 'Stavebni 15 Brno', '+420777111222');";
$sql .= "INSERT INTO employee (id, login, password, firstname, lastname, birthdate, contract_from_date, contract_to_date, address, phone) 
VALUES('', 'xauxtm00', 'heslo2', 'Martin', 'Auxt', '1111-11-11', '0000-00-00', '0000-00-00', 'Tylova 82 Brno', '+420666999888');";
$sql .= "INSERT INTO employee (id, login, password, firstname, lastname, birthdate, contract_from_date, contract_to_date, address, phone) 
VALUES('', 'xlezol00', 'heslo3', 'Lukas', 'Lezo', '1111-11-11', '0000-00-00', '0000-00-00', 'Ceil 21 Brno', '+420124859658');";

if($link->multi_query($sql) === TRUE) {
    echo "INSERT INTO employee success"."<br />";
} else {
    echo "Error INSERT INTO employee: ".$link->error."<br />";
}

mysqli_close($link);