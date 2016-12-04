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
                        <?php echo form_open('http://restaurant-system.9e.cz/app/reserve/try_reserve'); ?>

                        <select name="selectedRoom">
                            <?php foreach($rooms as $row) {
                                echo '<option value="'.$row->title."/".$row->id_room.'">'.$row->title.'</option>'; } ?>
                        </select>

                        <select name="selectedTables">
                            <?php foreach($tables as $row) {
                                echo '<option value="'.$row->id_table.'">'.$row->id_table.'</option>'; } ?>
                        </select>

                        <br>
                        <br>

                        <?php
                            echo form_label('Datum rezervace:');
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
                        <input id="reserveRoom" type="submit" name="reserve" value="Rezervovat celou místnost">
                        <input id="reserve" type="submit" name="reserve" value="Rezervovat pouze stůl">

                        <?php echo form_close(); ?>

                        <b><a href="http://restaurant-system.9e.cz/app/login/user_login_process">Back to admin page</a></b>
            </div>
        </div>
    </body>
</html>