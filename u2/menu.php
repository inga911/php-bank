<?php
session_start();
$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

?>

<!-- <a href="http://localhost/php-bank/u2/users.php?page=<?= $page ?>&sort=<?= $sort ?? '' ?>">PAGE <?= $page ?></a> -->


<a class="btn-menu btn" href="http://localhost/php-bank/u2/create.php">PRIDĖTI  NAUJĄ SĄSKAITĄ</a>

<!-- <a class="btn-menu btn" href="http://localhost/php-bank/u2/users.php">HOME</a> -->

