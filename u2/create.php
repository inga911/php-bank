
<?php
session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require __DIR__ . '/index.php';

    $clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));


    // foreach ($clients as $client) {
    //     if ($client['acc_number'] == $_POST['acc_number']) {
    //         die('Jūsų įvesta banko sąskaita jau egzistuoja');
    //     }
    //     if ($client['id_number'] == $_POST['id_number']) {
    //         die('Toks asmens kodas jau egzistuoja');
    //     }
    //     if ( $_POST['name'] <= 3) {
    //         die('Vardas turi buti ilgesnis nei 3 raides');
    //     }
    // }
    
    
    $client = [
        'surname' => $_POST['surname'],
        'name' => $_POST['name'],
        'acc_number' =>  $_POST['acc_number'],
        'id_number' => $_POST['id_number'],
        'funds' => 0,
        'id' => getUnique(1000)
    ];

    $clients[] = $client;
    // usort($clients, fn ($a, $b) => $a['surname'] <=> $b['surname']);
    file_put_contents(__DIR__ . '/clients.ser', serialize($clients));

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
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <a  class="btn-menu btn"  href="http://localhost/php-bank/u2/users.php">Grįžti į pradinį puslapį</a>
    <form action="" method="post" class="outline">
        <fieldset class="outline">
            <legend class="create-legend">Sukurti sąskaitą: </legend>
            <label class="create-legend" for="name">Vardas: </label>
            <input type="text" name="name">
            <br><br>
            <label class="create-legend" for="surname">Pavardė: </label>
            <input type="text" name="surname">
            <br><br>
            <label class="create-legend" for="acc_number">Sąskaitos numeris: </label>
            <input type="text" name="acc_number" value="LT6010100"><br>
            <span style="color:grey; font-size: 13px">Pvz.: LT6010100xxxxxxxxxxx (20 simboliu)</span>
            <br><br>
            <label class="create-legend" for="id_number">Asmens kodas: </label>
            <input type="text" name="id_number"><br>
            <span style="color:grey; font-size: 13px">3-6/ 00-99/ 01-12/ 01-31/ xx/ xx (11 simboliu)</span>
            <br><br>
            <span style="color:grey; font-size: 15px">Pradinės lėšos:  0 eurų</span><br>
            <button type="submit" class="btn">SUKURTI</button>
        </fieldset>

    </form>

</body>

</html>