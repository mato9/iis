<html>
    <head>
        <title>Update Data In Database Using CodeIgniter</title>
        <link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo "../css/update.css" ?>">
    </head>
    <body>
        <div id="container">
        <div id="wrapper">
            <h1>Update Data In Database Using CodeIgniter </h1><hr/>
            <div id="menu">
                <p>Click On Menu</p>
                <!-- Fetching Names Of All Employee From Database -->
                <ol>
                    <?php foreach ($employee as $employ): ?>
                    <li><a href="<?php echo "http://restaurant-system.9e.cz/app/update/show_employee_id/" . $employ->login; ?>"><?php echo $employ->firstname." "; echo $employ->lastname; ?></a></li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <div id="detail">
                <!-- Fetching All Details of Selected Employee From Database And Showing In a Form -->
                <?php foreach ($single_login as $employ): ?>
                    <p>Edit Detail & Click Update Button</p>
                    <form method="post" action="<?php echo "http://restaurant-system.9e.cz/app/update/update_employee_id1"?>">
                        <label id="hide">Login :</label>
                        <input type="text" id="hide" name="login" value="<?php echo $employ->login; ?>">
                        <label>Name :</label>
                        <input type="text" name="firstname" value="<?php echo $employ->firstname; ?>">
                        <label>Last name :</label>
                        <input type="text" name="lastname" value="<?php echo $employ->lastname; ?>">
                        <label>Email :</label>
                        <input type="email" name="email" value="<?php echo $employ->email; ?>">
                        <label>Birthday :</label>
                        <input type="date" name="birthdate" value="<?php echo $employ->birthdate; ?>">
                        <label>Address :</label>
                        <input type="text" name="address" value="<?php echo $employ->address; ?>">
                        <label>Phone :</label>
                        <input type="number" name="phone" value="<?php echo $employ->phone; ?>">
                        <label>Contract from date :</label>
                        <input type="date" name="contract_from_date" value="<?php echo $employ->contract_from_date; ?>">
                        <label>contract to date :</label>
                        <input type="date" name="contract_to_date" value="<?php echo $employ->contract_to_date; ?>">
                        <input type="submit" id="submit" name="update" value="Update">
                        <input type="submit" id="submit" name="delete" value="Delete">
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
        <b><a href="http://restaurant-system.9e.cz/app/login">Back</a></b>
        </div>
    </body>
</html>