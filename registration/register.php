<?php

    global $link;
//    $util_functions = new get_function();
    require_once("registration.php");
    require_once("../util_functions.php");
    //$date = date("d-m-Y");
    //$date = $today[wday].$today[mon].$today[year];

    // User has clicked the submit button
    if(isset($_POST['regist'])) {

        $link = $util_functions->getLink();

        if($register->registerUser($link))
        {
            $util_functions->sendToUrl("registration_success.html");
        }
        else $util_functions->sendToUrl("uz registrovany uzivatel.html");
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IIS Projekt</title>

        <!--<link rel="STYLESHEET" type="text/css" href="scripts/pwdwidget.css" />-->
        <script src="../scripts/pwdwidget.js" type="text/javascript"></script>
    </head>
    <body onLoad="setfocus()">
        
        <h1>Registracia</h1>
        <div id=content>
        <form id='register' action='<?php echo $util_functions->getSelf(); ?>' onsubmit="return user_checkvalues()" method='post' accept-charset='UTF-8'>
            <fieldset >
                <legend>Register</legend>
                <div class='container'>
                    <label for='firstname' >Firstname: </label><br/>
                    <input type='text' name='firstname' id='firstname' value='Firstname' maxlength="50" onfocus="if(this.value=='Firstname') this.value=''" required/><span id="fname">*</span><br/>
                    <label for='lastname' >Lastname: </label><br/>
                    <input type='text' name='lastname' id='lastname' value='Lastname' maxlength="50" onfocus="if(this.value=='Lastname') this.value=''"  required/><span id="lname">*</span><br/>
                </div>
                <div class='container'>
                    <label for='email' >Email Address:</label><br/>
                    <input type='email' name='email' id='email' value='' maxlength="50" required/><span id="mail">*</span><br/>
                </div>
                <div class='container'>
                    <label for='login' >Login:</label><br/>
                    <input type='text' name='login' id='login' value='Login' maxlength="50" onfocus="if(this.value=='Login') this.value=''" required/><span id="loginn">*</span><br/>
                    <div class='container' style='height:80px;'>
                        <label for='password' >Password:</label><br/>
                        <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                        <noscript>
                            <input type='password' name='password' id='password' maxlength="50" required/><span id="passw_or">*</span><br/>
                        </noscript>  
                    </div>
                    <label for='confirmpassword' >Confirm Password:</label><br/>
                    <input type='password' name='confirmpassword' id='confirmpassword' maxlength="50" value="Confirmpassword" onfocus="if(this.value=='Confirmpassword') this.value=''" required/><span id="passw_conf">*</span><br/>   
                </div>
                <div class='container'>
                    <label for='birthdate' >Birthday:</label><br/>
                    <input type='date' name='birthdate' id='birthdate' maxlength="50" /><br/>    
                </div>
                <div class='container'>
                    <label for='address' >Address:</label><br/>
                    <input type='text' name='address' id='address' maxlength="50" /><br/>   
                    <label for='phone' >Phone:</label><br/>
                    <input type='number' name='phone' id='phone' maxlength="50" /><br/> 
                    <input type="radio" name="user" value="customer" checked>Customer<br/>
                    <input type="radio" name="user" value="employee">Employee<br/>
                    <div id="employ" style="display: none">
                        <label for="contract_from_date">Contract_from_date</label><br/>
                        <input type='date' name='contract_from_date' id='contract_from_date' value="21.2.2012" maxlength="50" /><br/>
                        <label for="contract_to_date">Contract_to_date</label><br/>  
                        <input type='date' name='contract_to_date' id='contract_to_date' maxlength="50" /><br/>
                    </div>  
                </div>
                <div class="reset">
                    <input type="reset" name="reset" value="Reset"/><br/>
                </div>
                <div class='submit'>
                    <input type='submit' name='regist' value='Register' /><br/>
                </div>
            </fieldset>
        </form>
        </div>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
    <script type="text/javascript">
        var pass;
        function user_checkvalues() {
            var ret = true;

            var log;

            document.getElementById("passw_conf").innerHTML = "*";
            document.getElementById("contract_from_date").value = new Date().toISOString().substring(0, 10);
            if(document.forms["register"]["firstname"].value === document.forms["register"]["lastname"].value){
                document.getElementById("fname").style.color = "red";
                document.getElementById("lname").style.color = "red";
                document.getElementById("lname").innerHTML = "* Zhoduju sa ";
                ret = false;
            }
            else{
                document.getElementById("fname").style.color = "black";
                document.getElementById("lname").style.color = "black";
                document.getElementById("lname").innerHTML = "*";
            }

            if(document.forms["register"]["login"].value === ""){
                document.getElementById("loginn").style.color = "red";
                document.getElementById("loginn").innerHTML = "* Login error";
                ret = false;
            }
            else
            {
                if(document.forms["register"]["login"].value == document.forms["register"]["firstname"].value || document.forms["register"]["login"].value == document.forms["register"]["lastname"].value)
                {
                    document.getElementById("loginn").style.color = "red";
                    document.getElementById("loginn").innerHTML = "* Login sa zhoduje s menom, error";
                    ret = false;
                }
                else{
                    document.getElementById("loginn").style.color = "black";
                    document.getElementById("loginn").innerHTML = "*";
                }
            }

            if(document.forms["register"]["email"].value !== ""){
                document.getElementById("mail").style.color = "black";
                var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                var email = document.getElementById("mail").value;
                
                if(re.test(email) == -1)
                {
                    document.getElementById("mail").style.color = "red";
                    document.getElementById("mail").innerHTML = "* Email error";
                    ret = false;
                }
            }

            if(document.forms["register"][pass].value != document.forms["register"]["confirmpassword"].value){
                document.getElementById("passw_or").style.color = "red";
                document.getElementById("passw_conf").style.color = "red";
                document.getElementById("passw_conf").innerHTML = "* Password error!";
                ret = false;    
            }
            else{
                document.getElementById("passw_or").style.color = "black";
                document.getElementById("passw_conf").style.color = "black";
                document.getElementById("passw_conf").innerHTML = "*";
            }

            if(document.forms["register"][pass].value == document.forms["register"]["login"].value){
                document.getElementById("passw_or").style.color = "red";
                document.getElementById("passw_or").style.color = "red";
                document.getElementById("passw_or").innerHTML = "* Heslo sa zhoduje s loginom error!";
                ret = false;    
            }
            else{
                document.getElementById("passw_or").style.color = "black";
                document.getElementById("passw_or").style.color = "black";
                document.getElementById("passw_or").innerHTML = "*";
            }

            return ret;
        }

        function setfocus() { 
            document.register.firstname.focus(); 
            return; 
            } 

        $('input[type="radio"]').click(function(){
                if($(this).attr("value")=="customer")
                {
                    $("#employ").hide('slow');
                }
                if($(this).attr("value")=="employee")
                {
                    $("#employ").show('slow');
                }        
            });

        var pwdwidget = new PasswordWidget('thepwddiv','password');
        pass = pwdwidget.MakePWDWidget();
        //$('input[type="radio"]').trigger('click'); //zaklikne samo

    </script>
    </body>
</html>
        