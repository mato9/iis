<?php

    class Connection_db {

        // Store the single instance of Database
        private static $m_pInstance;

        private $db_host='localhost';
        private $db_user = 'root';
        //private $db_user = 'restaurantsystem'; //web user
        private $db_pass = '';
        //private $db_pass = 'root'; //web pass
        private $db_name = 'iisdb';
        private $link;

        /**
         * Private Connection_db constructor to limit object instantiation to within the class
         */
        private function __construct() {

            $this->link = new mysqli($this->db_host, $this->db_user, $this->db_pass);
            if ($this->link->connect_errno > 0) {
                die('Unable to connect to database [' . $this->link->connect_error . ']');
            }
            mysqli_select_db($this->link, $this->db_name);
//            return $this->link;
        }

        /**
         * Getter method for creating/returning the single instance of this class
         * @return Connection_db
         */
        public static function getInstance() {
            if (!self::$m_pInstance) {
                self::$m_pInstance = new Connection_db();
            }
            return self::$m_pInstance;
        }

        /**
         * Function to perform a query
         * @param $query
         * @return bool|mysqli_result
         */
        public function db_query($query) {
            $result = mysqli_query($this->link, $query) or die('db_query: unable to perform a query [' . $this->link->connect_error . ']');
            if ($result === false) {
                print_r("db_query error: %s\n", mysqli_error($this->link));
            }
            return $result;
        }

        /**
         * Function to perform a multi query
         * @param $multiQuery
         * @return bool|mysqli_result
         */
        public function db_multiQuery($multiQuery) {
            return mysqli_multi_query($this->link, $multiQuery) or die('db_query: unable to perform a query [' . $this->link->connect_error . ']');
        }


        /**
         * Closing database connection
         */
        public function db_close() {
            mysqli_close($this->link);
        }

        /**
         * Escaping characters before performing SQL query
         * @param $sql
         * @return string
         */
        public function escape($sql) {
            return mysqli_real_escape_string($this->link, $sql);
        }

     }
?>