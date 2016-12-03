<html>
    <head>
        <title>Reserve a table/room</title>
        <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="main">
            <div id="content">
                <h1>Register table/room</h1><br/>
                    <div id="message"></div>
                    <hr>
                        <?php echo form_open('http://localhost/app/reserve/try_reserve'); ?>

                        <select>
                            <?php foreach($rooms as $row) {
                                echo '<option value="'.$row->title.'">'.$row->title.'</option>'; } ?>
                        </select>

                        <select name="selectedTables">
                            <?php foreach($tables as $row) {
                                echo '<option value="'.$row->id_table.'">'.$row->id_table.'</option>'; } ?>
                        </select>

                        <br>
                        <br>

                        <?php
                            echo form_label('Reservation date:');
                            $date = array(
                            'type' => 'text',
                            'id' => 'reserve_date',
                            'name' => 'reserve_date',
                            'class' => 'input_box',
                            'placeholder' => 'dd-mm-yyyy',
                            'required' => ''
                            );
                            echo form_input($date);
                        ?>

                        <br>
                        <br>

                        <?php echo form_submit(array('id' => 'reserve', 'value' => 'Reserve')); ?>
                        <?php echo form_close(); ?>

                        <b><a href="http://localhost/app/login/user_login_process">Back to admin page</a></b>
            </div>
        </div>
    </body>
</html>