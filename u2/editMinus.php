<?php
define('ENTER', true);
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

    $fundsDeducted = false;

    foreach ($clients as &$client) {
        if ($client['id'] == $id) {
            $fundsMinus = $_POST['funds'];
            if ($fundsMinus > $client['funds']) {
                $_SESSION['msg'] = ['type' => 'error', 'text' => 'Nepakankamas sąskaitos likutis nuskaičiuoti Jūsų norimai sumai'];
                header('Location: http://localhost/php-bank/u2/users.php?id=');
                die;
            }
            $client['funds'] -= $fundsMinus;
            file_put_contents(__DIR__ . '/clients.ser', serialize($clients));
            $fundsDeducted = true;
            break;
        }
    }

    if ($fundsDeducted) {
        $_SESSION['msg'] = ['type' => 'ok', 'text' => 'Lėšos nuskaičiuotos sėkmingai.'];
        header('Location: http://localhost/php-bank/u2/users.php');
        die;
    }

    $_SESSION['msg'] = ['type' => 'error', 'text' => 'Nepavyko nuskaičiuoti lėšų.'];
    header('Location: http://localhost/php-bank/u2/editMinus.php?id=' . $id);
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
    <title>Nuskaičiuoti lėšas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a class="btn-menu btn" href="http://localhost/php-bank/u2/users.php">Grįžti į pradinį puslapį</a>

    <form action="http://localhost/php-bank/u2/editMinus.php?id=<?= $client['id'] ?>" method="post">
        <fieldset  class="outline-edit-plus">
            <legend  class="create-legend">Nuskaičiuoti lėšas: </legend>
            <b>Vardas: </b> <?= $client['name'] ?> <br>
            <b>Pavardė: </b><?= $client['surname'] ?><br>
            <label class="create-legend" for="funds"><b>Nuskaičiuoti nuo sąskaitos: </b></label>
            <input class="inputTxt"  type="text" name="funds"><br>
            <span class="funds">Likutis sąskaitoje: <?= $client['funds'] ?></span><br>

            <button class="btn-menu btn" type="submit">Išsaugoti</button>
        </fieldset>
    </form>

</body>

</html>