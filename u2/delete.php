<?php define('ENTER', true) ?>
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_GET['id'])) {
    http_response_code(400);
    die;
}

session_start();
$id = (int)$_GET['id'];
$clients = unserialize(file_get_contents(__DIR__ . '/clients.ser'));

$can_delete = true;
foreach ($clients as $key => $client) {
    if ($client['id'] == $id) {
        if ($client['funds'] > 0) {
            $can_delete = false;
            $_SESSION['msg'] = ['type' => 'error', 'text' => 'Negalima ištrinti sąskaitos, turint likutį.'];
            break; 
        } else {
            unset($clients[$key]);
            $_SESSION['msg'] = ['type' => 'ok', 'text' => 'Saskaita sėkmingai ištrinta.'];
        }
    }
}

if ($can_delete) {
    $clients = array_filter($clients, fn($client) => $client['id'] != $id);
    file_put_contents(__DIR__ . '/clients.ser', serialize($clients));
}

header("Location: http://localhost/php-bank/u2/users.php");

?>