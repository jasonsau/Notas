<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset = "UTF-8" />
        <meta http-equiv = "X-UA-Compatible" content = "IE = edge" />
        <meta name = "viewport"
        content = "width = device-width,
        initial-scale = 1.0" />
        <link rel = "stylesheet" href = "../../src/css/header/style.css" />
    </head>
<?php
session_start();
if($_SESSION['username'] == false) {
    header("Location: ../../Controller/UserController.php?login=login");
}
?>
    <body>
        <?php require_once "../static/header.php" ?>
    </body>
</html>
