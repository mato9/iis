<?php

include "connect_db.php";

$sql = "CREATE TABLE IF NOT EXISTS employee (
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  login VARCHAR(25) NOT NULL,
  password VARCHAR(30) NOT NULL,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  birthdate DATE NOT NULL,
  contract_from_date DATE NOT NULL,
  contract_to_date DATE NOT NULL,
  address VARCHAR(50) NOT NULL,
  phone VARCHAR(30) NOT NULL
);";

if($link->query($sql) === TRUE) {
    echo "TABLE employee created successfully"."<br />";
} else {
    echo "Error creating table: ".$link->error."<br />";
}

mysqli_close($link);
