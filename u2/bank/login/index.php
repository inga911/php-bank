<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$users = json_decode(file_get_contents(__DIR__. '/../database/users.json'), 1);


if(isset($_GET['logout'])){
    unset($_SESSION['logged'], $_SESSION['name']);
    header('Location: http://localhost/php-bank/u2/bank/');
    die;
}

foreach($users as $user) {
    if($user['name'] == $_POST['name'] && $user['psw'] == md5($_POST['psw'])) {
        $_SESSION['logged'] = 1;
        $_SESSION['name'] = $user['name'];
        header('Location: http://localhost/php-bank/u2/users.php');
        die;
    }
}
$_SESSION['msg'] = ['type' => 'error', 'text' => 'Neteisingas vartotojo vardas arba slaptažodis.'];
header('Location: http://localhost/php-bank/u2/bank/login/');
die;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banko prisijungimas</title>
    <link rel="stylesheet" href="./logstyle.css">
    
</head>
<body class="login-body">

    <h1 class="login-title">Prisijungti</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
        $color = match($msg['type']) {
            'error' => '#C0392B ',
            'ok' => '#1E8449 ',
            default => '#E0E0E0'
        };
    }
    ?>
    <?php if(isset($msg)) : ?>
    <h2 style="color: <?= $color ?>; margin-left: calc(50% - 230px);">
        <?= $msg['text'] ?>
    </h2>
    <?php endif ?>
    <form action="" method="post" class="login-form">
        <div>
            <label class="login-label">Vartotojo vardas:</label>
            <input class="login-input" type="text" name="name">
        </div>
        <div>
            <label class="login-label">Slaptažodis:</label>
            <input class="login-input" type="password" name="psw">
        </div>
        <div>
            <button class="login-btn" type="submit">Prisijungti</button>
        </div>
    </form>
</body>
</html>