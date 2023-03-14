<?php
session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));
    // $id = json_decode(file_get_contents(__DIR__ . '/id.json'));
    // file_put_contents(__DIR__ . '/id.json', json_encode($id));


    // foreach ($clients as $client) {
    //     if ($client['acc_number'] == $_POST['acc_number']) {
    //         die('Jūsų įvesta banko sąskaita jau egzistuoja');
    //     }
    //     if ($client['id_number'] == $_POST['id_number']) {
    //         die('Toks asmens kodas jau egzistuoja');
    //     }
    // }
    
    
    $client = [
        'surname' => $_POST['surname'],
        'name' => $_POST['name'],
        'acc_number' =>  $_POST['acc_number'],
        'id_number' => $_POST['id_number'],
        'funds' => 0
    ];

    $clients[] = $client;
    // usort($clients, fn ($a, $b) => $a['surname'] <=> $b['surname']);
    file_put_contents(__DIR__ . '/clients.ser', serialize($clients));

    $clients = serialize($clients);

    // $id = json_decode(file_get_contents(__DIR__ . '/id.json'));
    // $id++;
    // file_put_contents(__DIR__ . '/id.json', json_encode($id));



    header('Location: http://localhost/php-bank/u2/users.php');
   die;
}


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
    <a href="http://localhost/php-bank/u2/users.php">HOME</a>
    <form action="" method="post">
        <fieldset>
            <legend>Sukurti sąskaitą: </legend>
            <label for="name">Vardas: </label>
            <input type="text" name="name">
            <br><br>
            <label for="surname">Pavardė: </label>
            <input type="text" name="surname">
            <br><br>
            <label for="acc_number">Sąskaitos numeris: </label>
            <input type="text" name="acc_number" value="LT60 10100 "><br>
            <span class="info" style="color:silver; font-size: 13px">Pvz.: LT60 10100 xxxxxxxxxxx (20 simboliu)</span>
            <br><br>
            <label for="id_number">Asmens kodas: </label>
            <input type="text" name="id_number"><br>
            <span class="info" style="color:silver; font-size: 13px">3-6/ 00-99/ 01-12/ 01-31/ xx/ xx (11 simboliu)</span>
            <br><br>
            <label for="surname">Pradines lesos:  0</label><br><br>
            <button type="submit">SUKURTI</button>
        </fieldset>

    </form>


</body>

</html>