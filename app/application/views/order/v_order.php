<html>
<head>
    <title>Order a menu</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();
    ?>js/addSelect.js"></script>

</head>
<body>
<div class="main">
    <div id="content">
        <h1>Order a menu</h1><br/>
        <div id="message"></div>
        <hr>

        <?php echo form_open('http://localhost/app/order/try_order'); ?>

        <label>Table</label>:
        <select name="selectedTables">
            <?php foreach($tables as $row) {
                echo '<option value="'.$row->id_table.'">'.$row->id_table.'</option>'; } ?>
        </select>

        <div id="divcls">
            <label>New menu item</label>:
            <select id="ss" name="selectedMenus">
                <?php foreach($menus as $row) {
                    echo '<option id="'.$row->id_food.'" value="'.$row->name."/".$row->id_food.'">'.$row->name.'</option>'; } ?>
            </select>
        </div>


        <?php
        $opts = 'placeholder="Počet kusů"';
        echo form_input('quantity', '', $opts); ?>

        <br>
        <br>

        <br>
        <br>

        <?php echo form_submit(array('id' => 'order', 'value' => 'Order')); ?>
        <?php echo form_close(); ?>

        <b><a href="http://localhost/app/login/user_login_process">Back to admin page</a></b>
    </div>
</div>
</body>
</html>