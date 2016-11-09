<?php
    $function = new get_function();
    $dir = getcwd();
    //include($dir.'/db/connect_db.php');
    //include('login/login.php');
    require_once("registration/registration.php");
    require_once("db/create_table.php");
    require_once("db/fill_table.php");
    require_once("db/config.php");

    class get_function{
    var $rand_key;

        function GetSelf()
        {
            return htmlentities($_SERVER['PHP_SELF']);
        } 

        function sendToUrl($url)
        {
            header("Location: $url");
            exit;
        }

        public static function a()
        {
            echo"asdas dsads sdad";
        }

        /*function addUser()
        {
            $register->registerUser();
        }*/



    }



?>