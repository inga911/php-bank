
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

function personalId(){
    static $ids = [];
    $id_number = '';
    do {
    $birth_century = rand(3,6);//20th and 21th century
    $birth_year = rand(0,99);
    $birth_month = rand(01, 12);
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $birth_month, date("Y"));
    $birth_day = rand(01, $daysInMonth);
    $sequence_numb = rand(0, 999);
    $control_numb = rand(0, 9);
    $id_number = sprintf('%d%02d%02d%03d%d', $birth_century, $birth_year, $birth_month, $birth_day, $sequence_numb, $control_numb);    
   
}while (in_array($id_number, $ids));

    $ids[] = $id_number;

    return $id_number;
}


function getRandName($namesArray) {
    $randomIndex = array_rand($namesArray);
    return $namesArray[$randomIndex];
}
function getName() {
    $names = array('Kate', 'Šuo', 'Lapė', 'Karvė', 'Bebras', 'Pingvinas');
    $randomName = getRandName($names);
    return $randomName;
}

function getRandLastName($lastNamesArray) {
    $randomIndex2 = array_rand($lastNamesArray);
    return $lastNamesArray[$randomIndex2];
}
function getLastName() {
    $lastNames = array('Katinauskas', 'Lapauskas', 'Karvyte', 'Bebrauskas', 'Zebrauskas');
    $randomName = getRandLastName($lastNames);
    return $randomName;
}


function accNumber(){
    $countryCode  = 'LT';
    $controlDigits = '60';
    $bankCode = '10100';
    $accNumb = str_pad(mt_rand(0, 99999999999), 11, '0', STR_PAD_LEFT);
    $acc_num = $countryCode . $controlDigits  . $bankCode . $accNumb;
    return $acc_num;
}

function funds() {
    $balance = rand(0,3000);
    return $balance;
}



$clients = array_map(fn($_) =>  [
    'id' => getUnique(100),
    'id_number' => personalId(),
    'acc_number' => accNumber(),
    // 'name' => randString(),
    'surname' => getLastName(),
    // 'funds' => funds()
], range(1, 20));



$clients = array_map(function($client) {
    // $client['id_number'] = personalId();
    // $client['acc_number'] = accNumber();
    $client['name'] = getName();
    // $client['surname'] = randString();
    $client['funds'] = funds();
    return $client;
}, $clients);

usort($clients, fn($a, $b) => $a['surname'] <=> $b['surname']);
file_put_contents(__DIR__ . '/clients.ser', serialize($clients), FILE_APPEND);
// echo '<pre>';
// print_r($clients);

?>