<?php

function getUnique($to)
{
    static $ids = [];
    do {
        $id = rand(1, $to);
    } while(in_array($id, $ids));
    $ids[] = $id;
    return $id;
}

function randString()
{
    $letters = range('a', 'z');
    $out = '';
    foreach(range(1, rand(3, 10)) as $_) {
        $out .= $letters[rand(0, count($letters) - 1 )];
    }
    return $out;
}

$clients = array_map(fn($_) => ['user_id' => getUnique(100), 'place_in_row' => rand(1, 100), 'id_number' => rand(1000, 9999)], range(1, 30));

usort($clients, fn($a, $b) => $a['user_id'] <=> $b['user_id']);

$clients = array_map(function($user) {
    $user['name'] = randString();
    $user['surname'] = randString();
    return $user;
}, $client);

file_put_contents(__DIR__ . '/clients.ser', serialize($clients));
echo '<pre>';
print_r($clients);

?>