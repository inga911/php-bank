
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
    if (strlen($_POST['name']) < 4 || strlen($_POST['surname']) < 4) {
        // $_SESSION['msg'] = ['type' => 'error', 'text' => 'Vardas ir/ar pavarde turi buti ilgesni nei 3 raides'];
        header('Location: http://localhost/php-bank/u2/create.php?error=name_surname_length');
        die;
    }
    // }
    // $_SESSION['msg'] = ['type' => 'error', 'text' => 'Sie duomenys jau egsituoja'];
    // header('Location: http://localhost/php-bank/u2/menu.php');
    // die;
    
    
    $client = [
        'surname' => ucfirst($_POST['surname']),
        'name' => ucfirst($_POST['name']),
        'acc_number' =>  accNumber(),
        'id_number' => personalId(),
        'funds' => 0,
        'id' => getUnique(1000)
    ];

    $clients[] = $client;
   
    usort($clients, fn ($a, $b) => $a['surname'] <=> $b['surname']);
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
    
    <?php if (isset($_GET['error']) && $_GET['error'] === 'name_surname_length'): ?>
        <h2 class="error" style="color:#C0392B">Vardas ir/ar pavardė turi buti ilgesni nei 3 raidės.</h2>
    <?php endif; ?>

    <form action="" method="post" class="outline">
        <fieldset class="outline-create">
            <legend class="create-legend">Sukurti sąskaitą: </legend>
            <label class="create-legend" for="name">Vardas: </label>
            <input class="inputTxt" type="text" name="name">
            <br><br>
            <label class="create-legend" for="surname">Pavardė: </label>
            <input  class="inputTxt"  type="text" name="surname">
            <br><br>
            <label class="persId">Sąskaitos numeris ir asmens kodas bus sugeneruotas automatiškai paspaudus mygtuką <u>sukurti</u>. </label><br>
            <!-- <label class="create-legend" for="acc_number">Sąskaitos numeris: </label>
            <input type="text" name="acc_number"><br>
            <br><br>
            <label class="create-legend" for="id_number">Asmens kodas: </label>
            <input type="text" name="id_number"><br>
            <br><br> -->
            <span class="funds">Pradinės sąskaitos lėšos:  0 eurų</span><br>
            <button type="submit" class="btn">SUKURTI</button>
        </fieldset>

    </form>

</body>

</html>