<?php
    //$connectdb = new config_db();
    //define('DB_SERVER', 'localhost:/var/run/mysql/mysql.sock');
    //define('DB_USERNAME', 'xzhant00');
    //define('DB_PASSWORD', 'ca2bunve');
    //define('DB_DATABASE', 'xzhant00');
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'iis');
    

    /*class config_db
    {
        //private static $m_pInstance;

        private $DB_SERVER = "localhost";
        private $DB_USERNAME = "root";
        private $DB_PASSWORD = "";
        private $DB_DATABASE = "iis";

        function a()
        {
            echo "asa";
        }

        function connect()
        {
            $link = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            if (!$link)
            {
                die('nelze se pripojit '.mysql_error());
            }

            if (!mysql_select_db(DB_DATABASE, $link))
            {
                die('database neni dostupna '.mysql_error());
            }
            return $link;
        }

        /*public static function getInstance()
        {
            if (!self::$m_pInstance)
            {
                self::$m_pInstance = new config_db();
            }
            return self::$m_pInstance;
        }

        public function query($query)
        {
            return mysql_query($query);
        }*/

        class config_db
        {
            // Store the single instance of Database
            private static $m_pInstance;

            private $db_host='localhost';
            private $db_user = 'root';
            private $db_pass = '';
            private $db_name = 'iis';
            private $link;
            // Private constructor to limit object instantiation to within the class
            private function __construct() 
            {
                $this->link = mysql_connect($this->db_host,$this->db_user,$this->db_pass);
                mysql_select_db($this->db_name);
            }

            // Getter method for creating/returning the single instance of this class
            public static function getInstance()
            {
                if (!self::$m_pInstance)
                {
                    self::$m_pInstance = new config_db();
                }
                return self::$m_pInstance;
            }

            public function query($query)
            {
               return mysql_query($query);
            }

            public function closeDB()
            {
                mysqli_close();
            }

            public function escape($sql)
            {
                if(function_exists("mysqli_real_escape_string"))
                    return mysqli_real_escape_string($sql);
                else
                    return addslashes($sql);
            }

         }
//}
?>