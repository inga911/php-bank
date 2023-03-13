<?php
$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

$page = (int) ($_GET['page'] ?? 1);


$sort = $_GET['sort'] ?? '';


if ($sort == 'surname_asc') {
    usort($clients, fn($a, $b) => $a['surname'] <=> $b['surname']);
}
elseif ($sort == 'surname_desc') {
    usort($clients, fn($a, $b) => $b['surname'] <=> $a['surname']);
}
$clients = array_slice($clients, ($page - 1) * 10, 10);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
</head>

<body>
    <?php require __DIR__ . '/menu.php' ?> 
<!-- <a href="http://localhost/php-bank/u2/create.php">Sukurti naują sąskaitą</a> -->
    
<br><br>
    <form action="" method="get">
    <form action="http://localhost/php-bank/u2/users.php?sort=surname_asc" method="get">
        <fieldset>
            <legend>RŪŠIUOTI:</legend>
            <select name="sort">
                <option value="surname_asc" <?php if ($sort == 'surname_asc') echo 'selected' ?>>Pavardė A-Z</option>
                <option value="surname_desc" <?php if ($sort == 'surname_desc') echo 'selected' ?>>Pavardė Z-A</option>
            </select>
            <button type="submit">Rūšiuoti</button>
        </fieldset>
      
    </form>

    <ul>
        
    <?php foreach($clients as $client) : ?>
            <li><b>Pavarde: </b> <?= $client['surname'] ?> </li>
            <li><b>Vardas: </b> <?= $client['name'] ?> </li>
            <li><b>Amens kodas: </b><?= $client['id_number'] ?> </li>
            <li><b>Banko saskaitos numeris: </b> <?= $client['acc_number'] ?></li>
            <li><b>Lesos: </b> <?= $client['funds'] ?></li>
             <form action="http://localhost/php-bank/u2/delete.php?id_number=<?= $client['id_number'] ?>" method="post"> 
                <button type="submit">Istrinti</button>
            </form>
            <form action="" method="post"> 
                <button type="submit">Prideti lesu</button>
            </form>  
        <?php endforeach ?>
        
    </ul>

</body>

</html>