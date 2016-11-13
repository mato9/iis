<?php
    
    //include('login/login.php');
    require_once("registration/registration.php");
    require_once("db/createTable.php");
    require_once("db/fillTable.php");
    require_once("db/connectionDatabase.php");
    $util_functions = new get_function();
    class get_function {
        
        var $rand_key;
        var $link;

        /**
         * get_function constructor.
         */
        public function __construct()
        {
            $this->link = Connection_db::getInstance();
        }

        function getSelf() {
            return htmlentities($_SERVER['PHP_SELF']);
        } 
    
        function sendToUrl($url) {
            header("Location: $url");
            exit;
        }
        
        function getLink() {
            return $this->link;
        }
    
    }

?>