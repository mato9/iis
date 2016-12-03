<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/app/login/user_login_process");
}
?>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
    <div id="login">
        <h2>Registration Form</h2>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('http://localhost/app/login/new_user_registration');

        echo form_label('Create Login : ');
        echo"<br/>";
        echo form_input('login');
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo $message_display;
        }
        echo "</div>";
        echo"<br/>";
        echo form_label('Email : ');
        echo"<br/>";
        $data = array(
            'type' => 'email',
            'name' => 'email'
        );
        echo form_input($data);
        echo"<br/>";
        echo"<br/>";
        echo form_label('Password : ');
        echo"<br/>";
        echo form_password('password');
        echo"<br/>";
        echo"<br/>";
        echo form_label('First name :');
        echo form_input($data = array('id' => 'firstname', 'name' => 'firstname'));
        echo"<br/>";
        echo"<br/>";
        echo form_label('Last name :');
        echo form_input($data = array('id' => 'lastname', 'name' => 'lastname'));
        echo"<br/>";
        echo"<br/>";
        echo form_label('Birthday :');
        $date = array(
            'type' => 'text',
            'id' => 'birthdate',
            'name' => 'birthdate',
            'class' => 'input_box',
            'placeholder' => 'dd-mm-yyyy',
            'required' => ''
        );
        echo form_input($date);
        echo"<br/>";
        echo"<br/>";
        echo form_label('Address :');
        echo form_input($data = array('id' => 'address', 'name' => 'address'));
        echo"<br/>";
        echo"<br/>";
        echo form_label('Phone :');
        echo form_input($data = array('id' => 'phone', 'name' => 'phone'));
        echo"<br/>";
        echo"<br/>";
        echo form_submit('submit', 'Register');
        echo form_close();
        ?>
        <?php

        // When user submit CORRECT VALUES.
        if(isset($login) && isset($Birthday)){
            echo "<div id='content_result'>";
            echo "<h3 id='result_id'>You have submitted these values</h3><br/><hr>";
            echo "<div id='result_show'>";
            echo "<label class='label_output'>Entered Login : </label>".$login;
            echo"<br/><br/>";
            echo "<label class='label_output'>Entered Date: </label>".$Birthday;
        }
        ?>
        <a href="http://localhost/app/login/index">For Login Click Here</a>
    </div>
</div>
</body>
</html>