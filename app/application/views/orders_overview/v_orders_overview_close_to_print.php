<html>
<head>
    <title>Print order details</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        function printFunction() {
            printCSS = String('<link href="../../../../css/printStyle.css" rel="stylesheet" type="text/css">');
            window.frames["print_frame"].document.body.innerHTML=printCSS + document.getElementById('order_details').innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
</head>
<body>
<div class="main">
    <div id="content">
        <h1>Print order details</h1><br/>

        <div id='print_details'>
            <?php
            if($details != NULL){
                $order_id = '';
                $table_id = '';
                foreach($details as $order):
                    echo "<div id = 'order_details'>";
                    echo "ID: ";
                    echo $order->id_order;
                    $order_id .= $order->id_order .'/';
                    echo "<br/>";
                    echo "Table: ";
                    echo $order->id_table;
                    $table_id = $order->id_table;
                    echo "<br/>";
                    echo "Employee: ";
                    echo $login;
                    echo "<br/>";
                    $pay_methods = array(
                        $by_cash = 'Hotovost',
                        $by_card = 'Karta',
                    );
                    echo "Pay method: ";
                    echo form_dropdown('pay_method_dropdown', $pay_methods);
                    echo "<br/>";
                    if ($show_close) {
                        echo "Summary price: ";
                        echo $price;
                        echo " kc<br/>";
                    }
                    echo "</div>";
                    if ($show_close) {
                        echo "<b><a href='http://localhost/app/orders_overview/set_order_to_closed/$order->id_order'>Close order</a></b><br>";
                    }
                    echo "<b><a href='javascript:printFunction()'>Print order</a></b><br>";
                endforeach;
                if (!$show_close) {
                    echo "<br/>";
                    echo "Summary price: ";
                    echo $overall_price;
                    echo "<br/>";
                    echo "<b><a href='http://localhost/app/orders_overview/set_all_orders_to_closed/$table_id/$order_id'>Close order</a></b><br>";
                }
            }
            if($details == NULL) {
                echo "Incorrect date";
            }
            ?>
        </div>
        <br>
        <b><a href="http://localhost/app/orders_overview/show_order">Back to all orders</a></b>
    </div>
</div>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
</body>
</html>