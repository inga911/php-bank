<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_GET['id'])) {
    http_response_code(400);
    die;
}

$id = (int) $_GET['id'];

$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

$clients = array_filter($clients, fn($client) => $client['user_id'] != $id);

$clients = serialize($clients);
file_put_contents(__DIR__ . '/clients.ser', $clients);

header('Location: http://localhost/php-bank/u2/main.php');

?>