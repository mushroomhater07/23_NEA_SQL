<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        # code...
        ob_start();
        echo "This output will not be sent to the browser";
        ob_clean(); // clean output buffer
        $today = date("Y-m-d H:i:s");   
        echo $today;
        ob_end_flush();
  ?>
</body>
</html>