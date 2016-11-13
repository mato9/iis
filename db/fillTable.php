<?php

$fill = new fillTable();

    class fillTable {

        /**
         * Fast inserting employees
         * @param $vars - info to send
         * @return string - SQL string query
         */
        function insert_employee($vars) {

            $sql = "INSERT INTO employee (id, 
            login, 
            password, 
            firstname, 
            lastname, 
            email,
            birthdate, 
            contract_from_date, 
            contract_to_date, 
            address, 
            phone)
            VALUES('',
            '".$vars["login"]."',
            '".$vars["password"]."',
            '".$vars["firstname"]."',
            '".$vars["lastname"]."',
            '".$vars["email"]."',
            '".$vars["birthdate"]."',
            '".$vars["contract_from_date"]."',
            '".$vars["contract_to_date"]."',
            '".$vars["address"]."',
            '".$vars["phone"]."'
            );";
            return $sql;
        }
    }
?>