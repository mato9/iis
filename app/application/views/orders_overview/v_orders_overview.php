<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="main">
            <div id="find">
                <h1>Find order</h1>
                <div id="all">
                    <ol>
                        <?php foreach ($tables as $table): ?>
                        <li><a href="<?php echo "http://localhost/app/orders_overview/show_order/" . $table->id_table ."/". $table->id_employee ."/". $table->id_order; ?>">
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
                $table_id = '';
                    foreach($single_table as $order):
                        echo "<div id = 'order'>";
                        echo "ID: ";
                        echo $order->id_order;
                        echo "<br/>";
                        echo "Table: ";
                        echo $order->id_table;
                        $table_id = $order->id_table;
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
                        echo "<a href='http://localhost/app/orders_overview/close_an_order/$order->id_order'>Proceed to close this order</a>";
                        echo "</div>";
                    endforeach;

                    if ($single_table)
                        echo "<a href='http://localhost/app/orders_overview/close_all_orders/$table_id'>Proceed to close ALL orders</a>";
                ?>
                <br/>
                <b id = "back"><a href="http://localhost/app/login">Back</a></b>
            </div>
        </div>
    </body>
</html>