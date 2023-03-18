<?php
define('ENTER', true);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));


    foreach ($clients as &$client) {
        if ($client['id'] == $id) {
             $fundsToAdd = $_POST['funds'];
             $client['funds'] = $client['funds']  + $fundsToAdd;
            file_put_contents(__DIR__ . '/clients.ser', serialize($clients));

            break;
        }
    }
    $_SESSION['msg'] = ['type' => 'ok', 'text' => 'Sėkmingai pridėjote lėšas.'];
    header('Location: http://localhost/php-bank/u2/users.php');
    die;
}


//GET

$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

$id = $_GET['id'];
$find = false;
foreach ($clients as $client) {
    if ($client['id'] == $id) {
        $find = true;
        break;
    }
}

if (!$find) {
    die('client not found');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pridėti lėšų</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a class="btn-menu btn"  href="http://localhost/php-bank/u2/users.php">Grįžti į pradinį puslapį</a>

    <form action="http://localhost/php-bank/u2/editPlus.php?id=<?= $client['id'] ?>" method="post">
        <fieldset  class="outline-edit-plus">
            <legend  class="create-legend">Pridėti lėšų: </legend>
            <b>Vardas: </b> <?= $client['name'] ?> <br>
            <b>Pavardė: </b><?= $client['surname'] ?><br>
            <label class="create-legend" for="funds"><b>Įnešti į sąskaitą: </b></label>
            <input class="inputTxt" type="text" name="funds" ><br>
            <span class="funds">Likutis sąskaitoje: <?= $client['funds'] ?> Eur.</span><br>

            <button class="btn-menu btn"  type="submit">Išsaugoti</button>
        </fieldset>
    </form>

</body>

</html>
