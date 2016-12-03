<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $login = ($this->session->userdata['logged_in']['login']);
    $email = ($this->session->userdata['logged_in']['email']);
} else {
    header("location: http://localhost/app/login/");
}
?>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
?>
<div id="profile">
    <?php
    echo "Hello <b id='welcome'><i>" . $login . "</i> !</b>";
    echo "<br/>";
    echo "<br/>";
    echo "Welcome to Admin Page";
    echo "<br/>";
    echo "<br/>";
    echo "Your Username is " . $login;
    echo "<br/>";
    echo "Your Email is " . $email;
    echo "<br/>";
    ?>

    <b><a href="http://localhost/app/reserve">Reserve a room/table</a></b><br>
    <b><a href="http://localhost/app/update">Update employee</a></b><br>
    <b><a href="http://localhost/app/menu">Menu</a></b><br>
    <b><a href="http://localhost/app/record">Record</a></b><br>
    <b><a href="http://localhost/app/orders_overview">Orders overview</a></b><br>
    <b><a href="http://localhost/app/order">Menu order</a></b>
    <b id="logout"><a href="http://localhost/app/login/logout">Logout</a></b>
</div>
<br/>
</body>
</html>