<?php require_once "./mvc/views/blocks/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="/NLNGANH/" target="_self">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VN-PAY | Erator Watch</title>
    <link rel="stylesheet" href="public/assets/css/VN-pay.css">
    <link rel="icon" href="public/imgs/icon.png">
</head>

<body>
    <?php
    require_once "./mvc/views/pages/" . $data["page"] . ".php";
    ?>
</body>

</html>