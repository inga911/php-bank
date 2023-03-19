<?php

define('ENTER', true);
session_start();
$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));


$sort = '';
$surname_sort = $_GET['surname_sort'] ?? '';
if ($surname_sort === 'asc') {
    $sort = 'surname_asc';
} elseif ($surname_sort === 'desc') {
    $sort = 'surname_desc';
}

if ($sort == 'surname_asc') {
    usort($clients, fn($a, $b) => $a['surname'] <=> $b['surname']);
}
if ($sort == 'surname_desc') {
    usort($clients, fn($a, $b) => $b['surname'] <=> $a['surname']);
}
file_put_contents(__DIR__ . '/clients.ser', serialize($clients));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="users-body">
<?php require __DIR__ . '/bank/menu-log.php' ?>
<?php require __DIR__ . '/bank/safe/index.php' ?>
<?php require __DIR__ . '/menu.php' ?>
     
<form action="http://localhost/php-bank/u2/users.php" method="get">
    <legend>RŪŠIUOTI:</legend>
    <select name="surname_sort" class="sort">
        <option value="asc" <?php if ($surname_sort === 'asc') echo 'selected' ?>>Pavardė A-Z</option>
        <option value="desc" <?php if ($surname_sort === 'desc') echo 'selected' ?>>Pavardė Z-A</option>
    </select>
    <button class="btn btn-sort" type="submit">Rūšiuoti</button>
</form>
    <table class="table">
  <thead class="info">
    <tr>
      <th>Pavardė</th>
      <th class="th-two">Vardas</th>
      <th>Asmens kodas</th>
      <th class="th-two">Banko sąskaitos numeris</th>
      <th>Likutis (eur)</th>
      <th class="th-two">Veiksmai</th>
    </tr>
  </thead>
  <tbody>
    <?php if (is_array($clients)): ?>
      <?php foreach($clients as $client) : ?>
        <tr>
          <td class="one"><?= $client['surname'] ?></td>
          <td class="two"><?= $client['name'] ?></td>
          <td  class="one"><?= $client['id_number'] ?></td>
          <td class="two"><?= $client['acc_number'] ?></td>
          <td class="one"><?= $client['funds']?></td>
          <td class="two">
            <div class="veiksmai">
                <a class="a-plus btn" href="http://localhost/php-bank/u2/editPlus.php?id=<?= $client['id'] ?>">Pridėti lėšų</a>
                <a class="a-minus btn" href="http://localhost/php-bank/u2/editMinus.php?id=<?= $client['id'] ?>">Nuskaičiuoti lėšas</a>
                <form action="http://localhost/php-bank/u2/delete.php?id=<?= $client['id'] ?>" method="post">
                    <button class="btn-f btn" type="submit">Ištrinti</button>
                </form>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    <?php endif; ?>
  </tbody>
</table>

</body>

</html>