<?php 
require_once "Tools\Autoloader.php";
Autoloader::register();
?>
<html>

<head>
    <title>A-corp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <header>
        <br>
        <a href="index.php?submenu=home">home</a>
        <a href="index.php?submenu=login">login</a>
        <a href="index.php?submenu=logout">logout</a>
        <a href="index.php?submenu=register">register</a>
        <br>
    </header>

    <?php Router::route(); ?>

</body>

</html>

