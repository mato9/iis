<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/sas/app/login/user_login_process");
}
?>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Resis - registrace</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
 <div id="cont_bg" class="container col-sm-8 center_container">
    <img class="img-responsive center" src="http://i.imgur.com/IgN4N96.png" width="120px" height="120px">
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        $data = array(
            'class' => 'form-horizontal'
        );
        echo form_open('http://localhost/sas/app/login/new_user_registration', $data);
        echo '<h2 class="signup_label">Registration Form</h2>';
        echo "<div class='form-group brd_topxs'>";
        $data = array(
            'type' => 'text',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('Create Login: ', 'createLogin', $data);
        echo"<div class='col-sm-10'>";
        $data = array(
            'type' => 'text',
            'class' => 'form-control form_bg',
            'name' => 'login',
            'placeholder' => "login",
            'required' => ''
        );
        echo form_input($data);
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo $message_display;
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo '<div class="form-group ">';
        $data = array(
            'type' => 'text',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('Password : ','password', $data);
        echo '<div class="col-sm-10">';
        $data = array(
            'type' => 'password',
            'class' => 'form-control form_bg',
            'name' => 'password',
            'placeholder' => "********",
            'required' => ''
        );
        echo form_password($data);
        echo "</div>";
        echo "</div>";

        echo '<div class="form-group ">';
        $data = array(
            'type' => 'text',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('Email : ', 'email', $data);
        echo '<div class="col-sm-10">';
        $data = array(
            'type' => 'email',
            'class' => 'form-control form_bg',
            'name' => 'email',
            'placeholder' => "email",
            'required' => ''
        );
        echo form_input($data);
        echo "</div>";
        echo "</div>";

        echo '<div class="form-group">';
        $data = array(
            'type' => 'text',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('First name: ', 'firstname', $data);
        echo '<div class="col-sm-10">';
        echo form_input($data = array('id' => 'firstname', 'name' => 'firstname', 'class' =>"form-control form_bg", 'placeholder' => "firstname", 'required' => '' ));
        echo "</div>";
        echo "</div>";

        echo '<div class="form-group">';
        $data = array(
            'type' => 'text',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('Last name :', 'lastname', $data);
        echo '<div class="col-sm-10">';
        echo form_input($data = array('id' => 'lastname', 'name' => 'lastname', 'class' =>"form-control form_bg", 'placeholder' => "lastname", 'required' => ''));
        echo '</div>';
        echo '</div>';

        echo '<div class="form-group">';
        $data = array(
            'type' => 'text',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('Birthday :','birthday', $data);
        $date = array(
            'type' => 'date',
            'id' => 'birthdate',
            'name' => 'birthdate',
            'class' => 'form-control form_bg',
            'placeholder' => 'dd-mm-yyyy',
            'required' => ''
        );
        echo '<div class="col-sm-10">';
        echo form_input($date);
        echo "</div>";
        echo "</div>";

        echo '<div class="form-group">';
        $data = array(
            'type' => 'text',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('Address :', 'address', $data);
        echo '<div class="col-sm-10">';
        echo form_input($data = array('id' => 'address', 'class' => "form-control form_bg",'name' => 'address', 'placeholder' => "address", 'required' => ''));
        echo "</div>";
        echo "</div>";
        
        echo '<div class="form-group">';
        $data = array(
            'type' => 'number',
            'class' => 'control-label col-sm-2'
        );
        echo form_label('Phone :', 'telefon', $data);
        echo '<div class="col-sm-10">';
        echo form_input($data = array('id' => 'phone', 'name' => 'phone', 'class' => "form-control form_bg", 'placeholder' => "phone", 'required' => ''));
        echo "</div>";
        echo "</div>";
        
        $date = array(
            'type' => 'text',
            'id' => 'owner',
            'name' => 'owner',
            'class' => 'hide',
            'placeholder' => 'weither'
        );
        echo form_input($date);

        $data = array(
            'type' => 'submit',
            'value' => 'Register',
            'name' => 'submit',
            'class' => 'btn btn-lg btn-primary btn-block brd_botxs'
        );

        echo form_submit($data);
        echo '<div class="signup_foot">';
        echo '<a href="http://localhost/sas/app/login/index" class="text_shadow">For Login Click Here</a>';
        echo '</div>';
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
        <!-- /container -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        
</div>
</body>
</html>