<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_GET['id_number'])) {
    http_response_code(400);
    die;
}

$id =  (int)$_GET['id_number'];
$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

foreach ($clients as $client) {
    if ($client['id_number'] == $id) {
        if ($client['funds'] > 0) {
            http_response_code(400);
            echo 'Negalima ištrinti jei sąskaitoje yra daugiau nei 0';
            die;
        }
        break;
    }
}
$clients = array_filter($clients, fn($client) => $client['id_number'] != $id);

$clients = file_put_contents(__DIR__ . '/clients.ser', serialize($clients));

header("Location: http://localhost/php-bank/u2/users.php");

?>