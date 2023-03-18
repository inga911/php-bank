<?php
define('ENTER', true);
session_start();
$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

// $page = (int) ($_GET['page'] ?? 1);


$sort = $_GET['sort'] ?? '';
if ($sort == 'surname_asc') {
    usort($clients, fn($a, $b) => $a['surname'] <=> $b['surname']);
}
elseif ($sort == 'surname_desc') {
    usort($clients, fn($a, $b) => $b['surname'] <=> $a['surname']);
}
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
     
<br><br>
    <form action="http://localhost/php-bank/u2/users.php?sort=surname_asc" method="get">
            <legend>RŪŠIUOTI:</legend>
            <select name="sort" class="sort">
                <option value="surname_asc" <?php if ($sort == 'surname_asc') echo 'selected' ?>>Pavardė A-Z</option>
                <option value="surname_desc" <?php if ($sort == 'surname_desc') echo 'selected' ?>>Pavardė Z-A</option>
            </select>
            <button class="btn btn-sort" type="submit">Rūšiuoti</button>
    </form>
    
    <table class="table">
  <thead class="info">
    <tr>
      <th>Pavardė</th>
      <th>Vardas</th>
      <th>Asmens kodas</th>
      <th>Banko sąskaitos numeris</th>
      <th>Likutis (eur)</th>
      <th>Veiksmai</th>
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