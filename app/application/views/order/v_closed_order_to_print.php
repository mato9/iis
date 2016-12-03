<html>
<head>
    <title>Print order details</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        function printFunction(divId) {
            printCSS = String('<link href="../../../../css/printStyle.css" rel="stylesheet" type="text/css">');
            window.frames["print_frame"].document.body.innerHTML=printCSS + document.getElementById(divId).innerHTML;
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
                foreach($details as $order):
                    echo "<div id = 'order_details'>";
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

                endforeach;
            }
            if($details == NULL) {
                echo "Incorrect date";
            }
            ?>
        </div>
        <br>
        <b><a href="javascript:printFunction('print_details')">Print order</a></b>

        <br>
        <br>
        <b><a href="http://localhost/app/record/show_order">Back to all orders</a></b>
    </div>
</div>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
</body>
</html>