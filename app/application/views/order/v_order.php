<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <div id="find">
                <h1>Find order</h1>
                <div id="all">
                    <ol>
                        <?php foreach ($tables as $table): ?>
                        <li><a href="<?php echo "http://restaurant-system.9e.cz/app/order/show_order/" . $table->id_table ."/". $table->id_employee ."/". $table->id_menu; ?>">
                        <div id='table'>
                            <?php 
                            echo "Number table:  ";
                            echo $table->id_table; 
                            ?>
                        </div>
                        </a></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
            <div id='show'>
                <?php 
                    foreach($single_table as $order):
                        echo "<div id = 'order'>";
                        echo "ID: ";
                        echo $order->id_order;
                        echo "<br/>";
                        echo "Table: ";
                        echo $order->id_table;
                        echo "<br/>";
                        echo "Count ks: ";
                        echo $order->id_count_ks;
                        echo "<br/>";
                        echo "Employee: ";
                        echo $login;
                        echo "<br/>";
                        echo "Menu: ";
                        echo $menu;
                        echo "<br/>";
                        echo "Price: ";
                        echo $order->price;
                        echo "kc<br/>";
                        echo "</div>";
                    endforeach;
                
                ?>
                <br/>
                <b id = "back"><a href="http://restaurant-system.9e.cz/app/login">Back</a></b>
            </div>
        </div>
    </body>
</html>