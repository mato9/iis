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
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
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
    <b id="logout"><a href="http://localhost/app/login/logout">Logout</a></b>
</div>
<br/>
</body>
</html>