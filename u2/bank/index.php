
<?php 
session_start();
define('ENTER', true);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bankas</title>
    <style>
        img {
            width:300px;
            margin-top: 7%;
            margin-left: calc(50% - 150px);
        }
        h1{
            text-transform: uppercase;
            margin-left: calc(50% - 300px);
            color: #A569BD;
        }
        span {
            font-size:45px;
        }
    </style>
    <!-- <link rel="stylesheet" href="../style.css"> -->
</head>
<body style="background-color: white;">
<img src="../img/piggy-bank-savings1.webp" alt="pig">

    <h1 class="welcome-title">Sveiki atvykę į <span>U2</span> banko puslapį!</h1>
    <?php require __DIR__ . '/menu-log.php' ?>
</body>
</html>

