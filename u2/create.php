<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
var_dump($_POST);

   
$id = getUnique(100);
    $client = [
        'surname' => $_POST['surname'],
        'name' => $_POST['name'],
        // 'account_number' => (int) $_POST['account_number'],
        'id_number' => $id,
        // 'funds' => '0'
    ];

// usort($clients, fn($a, $b) => $a['surname'] <=> $b['surname']);

    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

    $clients[] = $client;

    $clients = serialize($clients);
    file_put_contents(__DIR__ . '/clients.ser', $clients);

    header('Location: http://localhost/php-bank/u2/main.php');
    die;
}
$id = json_decode(file_get_contents(__DIR__ . '/id.json'));
    $id++;
    file_put_contents(__DIR__ . '/id.json', json_encode($id));



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukurti naują sąskaitą</title>
</head>

<body>
    
    <form action="" method="post">
        <fieldset>
            <legend>Sukurti sąskaitą: </legend>
            <label>Vardas: </label>
            <input type="text" name="name">
            <label>Pavardė: </label>
            <input type="text" name="surname">
            <!-- <label>Sąskaitos numeris: </label>
            <input type="text" name="account_number" > -->
            <!-- <label>Asmens kodas: </label>
            <input type="text" name="id_number"> -->
            <button type="submit">SUKURTI</button>
        </fieldset>

    </form>


</body>

</html>