<?php
$users = [
    ['name' => 'briedis@gmail.com', 'psw' => md5('123')],
    ['name' => 'lape@gmail.com', 'psw' => md5('123')],
    ['name' => 'antis@gmail.com', 'psw' => md5('123')]
];

file_put_contents(__DIR__. '/users.json', json_encode($users));

echo 'All is OK';
?>