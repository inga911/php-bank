<!-- <?php  
    // $clients = unserialize(file_get_contents(__DIR__ . '/clients.new'));
    // $all = ceil(count($clients) / 10);
// ?>

<?php foreach (range(1, $all) as $page) : ?>  -->
   
   <!-- <a href="http://localhost/php-bank/u2/main.php?page=<?= $page ?>&sort=<?= $sort ?? '' ?>">PAGE <?= $page ?></a> -->
   <!-- <a href="http://localhost/php-bank/u2/main.php?sort=<?= $sort ?? '' ?>">Sort  </a> -->

<!-- <?php endforeach ?> -->

<!-- <a href="http://localhost/php-bank/u2/create.php">Sukurti naują sąskaitą</a> -->
<?php 
   $users_ = unserialize(file_get_contents(__DIR__ . '/clients.ser'));
   // $all = ceil(count($users_) / 10);
?>
<!-- 
<?php foreach (range(1, $all) as $page) : ?>
  
   <a href=" http://localhost/php-bank/u2/users.php?page=<?= $page ?>&sort=<?= $sort ?? '' ?>">PAGE <?= $page ?></a>

<?php endforeach ?> -->

   <a href="http://localhost/php-bank/u2/create.php">Sukurti naują sąskaitą</a>

   <a href="http://localhost/php-bank/u2/main.php">HOME</a>