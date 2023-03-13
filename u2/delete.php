<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_GET['id_number'])) {
    http_response_code(400);
    die;
}

$id = $_GET['id_number'];

$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

$clients = array_filter($clients, fn($client) => $client['id_number'] != $id);

file_put_contents(__DIR__ . '/clients.ser', serialize($clients));

header('Location: http://localhost/php-bank/u2/main.php');
