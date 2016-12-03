<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sales overview</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../css/record.css" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <div id="find">
                <h1>Sales overview</h1>
                <form method="post" action="<?php echo "http://localhost/app/record/show_order"?>">
                    <label>Date from: </label>
                    <input type="date" name="d_from">
                    <br/>
                    <label>Date To: </label>
                    <br/>
                    <input type="submit" id="submit" name="Show" value="Show">
                </form>
            </div>
            <div id='show'>
                <?php 
                if($d_from != NULL){ 
                    foreach($d_from as $order):
                        echo "<div id = 'orders_overview'>";
                        echo "ID: ";
                        echo $order->id_order;
                        echo "<br/>";
                        echo "Table: ";
                        echo $order->id_table;
                        echo "<br/>";
                        echo "Date pay: ";
                        echo $order->date_pay;
                        echo "<br/>";
                        echo "Employee: ";
                        echo $login;
                        echo "<br/>";
                        echo "Pay method: ";
                        echo $order->pay_method;
                        echo "<br/>";
                        echo "Summary price: ";
                        echo $order->sum_price;
                        echo "kc<br/>";
                        echo "</div>";
                        echo "<br/>";
                    endforeach;
                }
                if($d_from == NULL) {
                    echo "Incorrect date";
                }
                ?>
                <br/>
                <b id = "back"><a href="http://localhost/app/login">Back</a></b>

            </div>
        </div>
    </body>
</html>