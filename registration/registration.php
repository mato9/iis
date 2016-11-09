<?PHP
$dir = getcwd();
//echo $dir." ss ";
//require_once("../db/create_table.php");
//require_once("/funkcie.php");
//require_once("../funkcie.php");

//include 'singleton.php';


$register = new member();
class member
{
    //$pDatabase = config_db::getInstance();  
    var $tablename = "";
    var $link = "";
    //var $cre_tabl = "";
    
    function registerUser($link)
    {   
        
        //$this->cre_tabl = $cre_tabl;
        $this->link = $link;
        if(!isset($_POST['regist']))
        {
           return false;
        }
        $form = array();
        //echo "dsds ".$_POST['user'];
        $this->tablename = $_POST['user'];
        if(!$this->collectvars($form))
        {
            //var_dump($form);
            return false;
        }
        //$this->conPass();

        if(!$this->sendDB($form))
        {
            return false;
        }
        return true;

    }

    function setTable($tablename)  //nastavi pozadovanu tabulku
    {
        global $createTable;
        $this->tablename = $tablename;
        //echo "t ".$this->tablename;
        //echo " s ".$tablename." d";
        $sql = "SHOW COLUMNS FROM ".$this->tablename;
        $result =  $this->link->query($sql);

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $result = $createTable->create_table_employee();
            return $this->link->query($result);
        }
        return true;
    }
    function sendDB($vars)  //$vars = pole premennych z formulara
    {
        
        /*if(!$connectdb->connect())
        {
            echo "chyba<br\>";
            return false;
        } */
        $this->setTable($this->tablename);
        //print_r($vars);
        if(!$this->checkunique($vars,'email'))
        {
            //chyba
            //echo "email";
            return false;
        }
        if(!$this->checkunique($vars,'login'))
        {
            //chyba
            //echo "login";
            return false;
        }
        //echo " dddd ";
        //echo date('l \t\h\e jS');
        if(!$this->insertToDB($vars))
        {
            //echo "inser";
            return false;
        }
        return true;
    }

    function insertToDB($vars)
    {
        global $fill;
        $result = $fill->insert_employee($vars);
      
        if(!$this->link->query($result)){
            return false;
        }
        return true;
    }

    function checkunique($field, $var)
    {
        $filedvar = $this->sanitizeSql($field[$var]);
        //echo "where ".$var." FROM  ".$this->tablename." fieldva[] ".$field[$var]."<br/>";
        $sql = "SELECT login FROM ".$this->tablename." where ".$var."='".$field[$var]."'";
        //echo $sql;
        $sql = $this->link->query($sql);       
        if($sql && (mysql_num_rows($sql) > 0))
        {
            return false;
        }
        else 
        {
            return true;
        }
    }

    function sanitizeSql($var)
    {//echo "sani ".$var;
    //global $link;
        if(function_exists("mysqli_real_escape_string"))
            $str = $this->link->escape($var);
        else
            $str = addslashes($var);
        return $str;
    }

    function collectvars(&$formvars)
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

    function sanitize($vars)
    {
        if(get_magic_quotes_gpc())
        {
            $vars = stripslashes($vars);
            //echo "<br /> aa".$vars."<br />";
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