<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $login = ($this->session->userdata['logged_in']['login']);
    $email = ($this->session->userdata['logged_in']['email']);
} else {
    header("location: http://restaurant-system.9e.cz/app/login/");
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

    <b id="logout"><a href="http://restaurant-system.9e.cz/app/reserve">Reserve a room/table</a></b>
    <b><a href="http://restaurant-system.9e.cz/app/update">Update employee</a></b>
    <b><a href="http://restaurant-system.9e.cz/app/menu">Menu</a></b>
    <b id="logout"><a href="http://restaurant-system.9e.cz/app/login/logout">Logout</a></b>
</div>
<br/>
</body>
</html>