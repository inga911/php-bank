<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id_number'];
    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

    foreach($clients as &$client) {
        if ($client['id_number'] == $id) {
            $client['funds'] += (int)$_POST['funds'];
            $clients = serialize($clients);
            file_put_contents(__DIR__ . '/clients.ser', $clients);

            break;
        }
    }
    header('Location: http://localhost/php-bank/u2/users.php');
    die;
}
 



//GET

$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

$id = $_GET['id_number'];
// $foundClient = null;
$find = false;
foreach($clients as $client) {
    if ($client['id_number'] == $id) {
        $find = true;
        // $foundClient = $client;
        break;
    }
}

if (!$find){
    die('client not found');
}

// $clientIndex = $_GET['id_number'];
// $newBalance = $_POST['funds'];
// $clients[$clientIndex]['funds'] = $newBalance;
// file_put_contents(__DIR__ . '/clients.ser', serialize($clients));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
</head>

<body>
<a href="http://localhost/php-bank/u2/users.php">HOME</a>

    <form action="http://localhost/php-bank/u2/users.php?id=<?= $client['id_number'] ?>" method="post">
        <fieldset>
            <legend>EDIT: </legend>
            <b>Vardas: </b> <?= $foundClient['name'] ?> <br>
            <b>Pavardė: </b><?= $foundClient['surname'] ?><br>
            <b>Balansas: </b>
            <input type="number" name="funds" value="<?= $foundClient['funds'] ?>">
            <button type="submit">Issaugoti</button>
        </fieldset>

    </form>


</body>

</html>