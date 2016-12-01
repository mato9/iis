<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo "../../css/menu.css" ?>">
    </head>
    <body>
        <div id="main">
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
                echo $error_message;
            }
            echo validation_errors();
            echo "</div>";
            ?>
            <h1>Pridanie jedal</h1>
            <hr/>
            <?php
            echo "<div class='error_msg'>";
            echo validation_errors();
            echo "</div>";
            echo form_open('http://restaurant-system.9e.cz/app/menu/new_menu');
            echo form_label('Name : ');
            echo"<br/>";
            echo form_input('name');
            echo "<div class='error_msg'>";
            if (isset($message_display)) {
                echo $message_display;
            }
            echo "</div>";
            echo "<br/>";
            echo form_label('Price: ');
            echo"<br/>";
            $data = array(
                'type' => 'number',
                'name' => 'price'
            );
            echo form_input($data);
            echo "kč<br/>";
            echo form_label('Weight: ');
            echo "<br/>";
             $data = array(
                'type' => 'number',
                'name' => 'weight'
            );
            echo form_input($data);
            echo "g<br/>";
            echo form_label('Quantity: ');
            echo "<br/>";
             $data = array(
                'type' => 'number',
                'name' => 'quantity'
            );
            echo form_input($data);
            echo "ks<br/>";
            echo form_label('Ingredience: ');
            echo "<br/>";
            $data = array(
                'name'        => 'ingredience',
                'id'          => 'txt_area',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:35%',
                );
            echo form_textarea($data);
            echo "<br/>";
            echo form_submit('submit', 'Add');
            echo form_close();
            ?>
        </div>
        <div id="all">
             <ol>
                <?php foreach ($foods as $food): ?>
                <li><a href="<?php echo "http://restaurant-system.9e.cz/app/menu/show_food/" . $food->name; ?>">
                <div id='f_name'>
                    <?php echo $food->name; ?>
                </div>
                </a></li>
                <?php endforeach; ?>
            </ol>
        </div>
        <div id="detail">
                <?php foreach($single_food as $food): ?>
                <p>Edit Detail & Click Update Button</p>
                <form method="post" action="<?php echo "http://restaurant-system.9e.cz/app/menu/update_menu_name"?>">
                <label>Name :</label>
                <input type="text" name="food_name" value="<?php echo $food->name; ?>">
                <label>Price :</label>
                <input type="number" name="food_price" value="<?php echo $food->price; ?>">
                <!--<label>Weight :</label>
                <input type="number" name="food_weight" value="<?php //echo $food->weight; ?>">-->
                <label>Quantity :</label>
                <input type="number" name="food_quantity" value="<?php echo $food->quantity; ?>">
                <label>Ingredience :</label>
                <input type="text" name="food_ingredience" id="txt_area" value="<?php echo $food->ingredience; ?>">
                <input type="submit" id="submit" name="update" value="Update">
                <input type="submit" id="submit" name="delete" value="Delete">
                </form>
                <?php endforeach; ?>
        </div>
        <b><a href="http://restaurant-system.9e.cz/app/login">Back</a></b>
    </body>
</html>