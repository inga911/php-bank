<?php
    // require __DIR__ . '/index.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

    foreach ($clients as &$client) {
        if ($client['id'] == $id) {
            $fundsMinus = $_POST['funds'];
            if ($fundsMinus > $client['funds']) {
                die('Nepakankamai lėšų nuskaičiuoti šiai sumai.');
            }
            $client['funds'] = $client['funds'] - $fundsMinus;
            file_put_contents(__DIR__ . '/clients.ser', serialize($clients));

            break;
        }
    }

    header('Location: http://localhost/php-bank/u2/users.php');
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
</head>

<body>
    <a href="http://localhost/php-bank/u2/users.php">HOME</a>

    <form action="http://localhost/php-bank/u2/editMinus.php?id=<?= $client['id'] ?>" method="post">
        <fieldset>
            <legend>Pridėti lėšų: </legend>
            <b>Vardas: </b> <?= $client['name'] ?> <br>
            <b>Pavardė: </b><?= $client['surname'] ?><br>
            <label for="funds"><b>Nuskaičiuoti nuo sąskaitos: </b></label>
            <input type="text" name="funds" ><br>
            <span class="info" style="color:grey; font-size: 13px">Likutis sąskaitoje: <?= $client['funds'] ?></span> <br>

            <button type="submit">Išsaugoti</button>
        </fieldset>
    </form>

</body>

</html>
