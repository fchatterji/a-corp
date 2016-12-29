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
        <a href="home">home</a>
        <a href="login">login</a>
        <a href="logout">logout</a>
        <a href="register">register</a>
        <a href="sallelist">liste des salles</a>
        <br>
    </header>

    <?php Router::route(); ?>

</body>

</html>

