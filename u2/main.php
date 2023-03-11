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
elseif ($sort == 'id_asc') {
    usort($clients, fn($a, $b) => $a['user_id'] <=> $b['user_id']);
}
elseif ($sort == 'id_desc') {
    usort($clients, fn($a, $b) => $b['user_id'] <=> $a['user_id']);
}
$clients = array_slice($clients, ($page - 1) * 10, 10);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANKAS U2</title>
</head>

<body>
<?php require __DIR__ . '/menu.php' ?> 
    <!-- <a href="http://localhost/php-bank/u2/main.php?sort=<?= $sort ?? '' ?>">Sort  </a>
    <a href="http://localhost/php-bank/u2/create.php">Sukurti naują sąskaitą  </a>
    <a href="http://localhost/php-bank/u2/main.php?add-funds">Pridėti lėšas  </a>
    <a href="http://localhost/php-bank/u2/main.php?deduct-funds">Nuskaičiuoti lėšas  </a>
    <a href="http://localhost/php-bank/u2/main.php?delete">Ištrinti</a>
    <a href="http://localhost/php-bank/u2/main.php">HOME</a> -->
<!-- <br><br> -->
    <form action="" method="get"></form>
    <form action="http://localhost/php-bank/u2/main.php?sort=surname_asc" method="get">
        <fieldset>
            <legend>RŪŠIUOTI:</legend>
            <select name="sort">
                <option value="surname_asc" <?php if ($sort == 'surname_asc') echo 'selected' ?>>Pavardė A-Z</option>
                <option value="surname_desc" <?php if ($sort == 'surname_desc') echo 'selected' ?>>Pavardė Z-A</option>
                <option value="id_asc" <?php if ($sort == 'id_asc') echo 'selected' ?>>ID 1-9</option>
                <option value="id_desc" <?php if ($sort == 'id_desc') echo 'selected' ?>>ID 9-1</option>
               
            </select>
            <button type="submit">Rūšiuoti</button>
        </fieldset>
    </form>

    <ul>
        <?php foreach($clients as $client) : ?>
        <li>
        <b>ID:</b> <?= $client['user_id'] ?> <i><?= $client['name'] ?> <?= $client['surname'] ?></i>
             <!-- <?= $client['surname'] ?> <?= $client['name']?> <?= $client['account_number'] ?><?= $client['id_number'] ?> -->
             <form action="http://localhost/php-bank/u2/delete.php?id=<?= $client['user_id'] ?>" method="post"> 
                <button type="submit">delete</button>
            </form>
            </li>
        <?php endforeach ?>
    </ul>

</body>

</html>