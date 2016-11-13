<?PHP
    
    // Class instance
    $register = new Member();

    /**
     * TODO: add description
     */
    class Member {

        // Class fields
        var $tablename = "";

        /** WARNING!!! Use this PHPDoc comment
         * in order to provide typehint
         * otherwise you'll get the error
         * "method 'db_query' not found in string" */
        /** @var Connection_db */
        var $link = "";

        /**
         * Registering new user
         * @param $link - db connection
         * @return bool - registering result
         */
        function registerUser($link) {

            // Getting db connection
            $this->link = $link;

            if (!isset($_POST['regist'])) {
               return false;
            }

            // Collection of input data
            $form = array();
            $this->tablename = $_POST['user'];
    
            if (!$this->collectVars($form)) {
                return false;
            }
    
            if (!$this->sendDB($form)) {
                return false;
            }
            return true;
    
        }

        /**
         * Nastavi pozadovanu tabulku
         * @param $tablename
         * @return bool
         */
        function setTable($tablename) {

            global $createTable;
            $this->tablename = $tablename;
            $sql = "SHOW COLUMNS FROM ".$this->tablename;
            $result = $this->link->db_query($sql);
    
            if (!$result || (!is_bool($result) && mysqli_num_rows($result) == 0)) {
                $result = $createTable->create_table_employee();
                return $this->link->db_query($result);
            }
            return true;
        }

        /**
         * @param $vars - pole premennych z formulara
         * @return bool
         */
        function sendDB($vars)   {
    
            $this->setTable($this->tablename);
            if (!$this->checkUnique($vars,'email')) {
                return false;
            }

            if(!$this->checkUnique($vars,'login')) {
                return false;
            }
    
            if(!$this->insertToDB($vars)) {
                return false;
            }
            return true;
        }

        /**
         * @param $vars
         * @return bool
         */
        function insertToDB($vars) {
            global $fill;
            $result = $fill->insert_employee($vars);
          
            if (!$this->link->db_query($result)) {
                return false;
            }
            return true;
        }

        /**
         * @param $field
         * @param $var
         * @return bool
         */
        function checkUnique($field, $var) {

            $filedvar = $this->sanitizeSql($field[$var]);
    
            $sql = "SELECT login FROM ".$this->tablename." where ".$var."='".$field[$var]."'"; //$field[$var] prepisat na $filedvar; pokial funguje mysqli_real_escape...
    
            $result = $this->link->db_query($sql);

            if (!is_bool($result) && mysqli_num_rows($result) > 0) {
                return false;
            } else if ($result) {
                return true;
            }

        }

        /**
         * @param $var
         * @return string
         */
        function sanitizeSql($var)
        {
            if(function_exists("mysqli_real_escape_string"))
                $str = $this->link->escape($var); //!!
            else
                $str = addslashes($var);
            return $str;
        }

        /**
         * @param $formvars
         * @return bool
         */
        function collectVars(&$formvars)
        {
            //$formvars['id']=
            $formvars['login']= $this->sanitize($_POST['login']);
            $formvars['password']= $this->sanitize($_POST['password']);
            $formvars['firstname']= $this->sanitize($_POST['firstname']);
            $formvars['lastname']= $this->sanitize($_POST['lastname']);
            $formvars['birthdate']= $this->sanitize($_POST['birthdate']);
            $formvars['email']= $this->sanitize($_POST['email']);
            $formvars['contract_from_date'] = $this->sanitize($_POST['contract_from_date']);
            $formvars['contract_to_date'] = $this->sanitize($_POST['contract_to_date']);
            $formvars['address']= $this->sanitize($_POST['address']);
            $formvars['phone']= $this->sanitize($_POST['phone']);
            return true;
        }

        /**
         * @param $vars
         * @return mixed|string
         */
        function sanitize($vars)
        {
            if(get_magic_quotes_gpc()) {
                $vars = stripslashes($vars);
            }
    
            $injreg = array('/(\n+)/i',
                    '/(\r+)/i',
                    '/(\t+)/i',
                    '/(%0A+)/i',
                    '/(%0D+)/i',
                    '/(%08+)/i',
                    '/(%09+)/i'
                    );
            $vars = preg_replace($injreg, '', $vars);
            return $vars;
        }
    }
?>