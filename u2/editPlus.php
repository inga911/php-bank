<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id_number'];
    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));


    foreach ($clients as &$client) {
        if ($client['id_number'] == $id) {
             $fundsToAdd = $_POST['funds'];
             $client['funds'] = $client['funds']  + $fundsToAdd;
            // $clients = serialize($clients);
            // file_put_contents(__DIR__ . '/clients.ser', $clients);
            file_put_contents(__DIR__ . '/clients.ser', serialize($clients));

            break;
        }
    }

    header('Location: http://localhost/php-bank/u2/users.php');
    // die;
}


//GET

$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

$id = $_GET['id_number'];
$find = false;
foreach ($clients as $client) {
    if ($client['id_number'] == $id) {
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

    <form action="http://localhost/php-bank/u2/editPlus.php?id_number=<?= $client['id_number'] ?>" method="post">
        <fieldset>
            <legend>Pridėti lėšų: </legend>
            <b>Vardas: </b> <?= $client['name'] ?> <br>
            <b>Pavardė: </b><?= $client['surname'] ?><br>
            <label for="funds"><b>Prideti prie saskaitos: </b></label>
            <input type="text" name="funds" ><br>
            <span class="info" style="color:grey; font-size: 13px">Likutis saskaitoje: <?= $client['funds'] ?></span> <br>

            <button type="submit">Issaugoti</button>
        </fieldset>
    </form>

</body>

</html>
