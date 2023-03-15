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



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="style.scss">
</head>

<body>
    <?php require __DIR__ . '/menu.php' ?> 
<!-- <a href="http://localhost/php-bank/u2/create.php">Sukurti naują sąskaitą</a> -->
    
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
      <th>Likutis</th>
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
                <a class="a-plus btn" href="http://localhost/php-bank/u2/editPlus.php?id_number=<?= $client['id_number'] ?>">Pridėti lėšų</a>
                <a class="a-minus btn" href="http://localhost/php-bank/u2/editMinus.php?id_number=<?= $client['id_number'] ?>">Nuskaičiuoti lėšas</a>
                <form action="http://localhost/php-bank/u2/delete.php?id_number=<?= $client['id_number'] ?>" method="post">
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