<?php
$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));
?>
<?php
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
        $color = match($msg['type']) {
            'error' => '#C0392B ',
            'ok' => '#1E8449 ',
            default => '#E0E0E0'
        };
    }
?>
<?php if(isset($msg)) : ?>
<h2 style="color: <?= $color ?>"><?= $msg['text'] ?></h2>

<?php endif ?>
<br><?php require __DIR__ . '/bank/menu-log.php' ?> 