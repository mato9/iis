<html>
    <head>
        <title>Codeigniter Form Dropdown</title>
        <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="main">
            <div id="content">
                <h2>Register table/room</h2><br/>
                    <div id="message"></div>
                    <hr>

                    <select class="form-control">
                    <?php

                    foreach($rooms as $row)
                    {
                        echo '<option value="'.$row->title.'">'.$row->title.'</option>';
                    }
                    ?>
                    </select>

                    
            </div>
        </div>
    </body>
</html>