<?php 
if (!isset($_SESSION['logged'])  || $_SESSION['logged'] != 1) {
    header('Location: http://localhost/php-bank/u2/bank/login');
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bankas privatiems klientams</title>
    <link rel="stylesheet" href="private-style.css">
</head>
<body class="private-body">
    <h1>Sveiki atvykę, <i><?= $_SESSION['name'] ?></i> !
        <form action="http://localhost/php-bank/u2/bank/login/?logout" method="post">
            <button class="logout-btn" type="submit">Atsijungti</button>
        </form>
    </h1>
    <a class="btn" href="http://localhost/php-bank/u2/create.php">PRIDĖTI  NAUJĄ SĄSKAITĄ</a>    
</body>
</html>