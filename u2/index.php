<?php

function personalId(){
    static $ids = [];
    $id_number = '';
    do {
    $birth_century = rand(3,6);
    $birth_year = rand(0,99);
    $birth_month = rand(1, 12);
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $birth_month, date("Y"));
    $birth_day = rand(1, $daysInMonth);
    $sequence_numb = rand(0, 99);
    $control_numb = rand(0, 99);

    $today = new DateTime(date('Y-m-d'));
    $birth_year_full = ($birth_century - 1) * 100 + $birth_year;
    $birth_day_full = new DateTime(sprintf('%04d-%02d-%02d', $birth_year_full, $birth_month, $birth_day));
    $birth_day = $birth_day_full;
    
    if ($birth_day > $today) {
        $birth_year--;
        $birth_year_full--;
        $birth_day_full = new DateTime(sprintf('%04d-%02d-%02d', $birth_year_full, $birth_month, $birth_day));
        $birth_day = $birth_day_full;

    }

    $id_number = sprintf('%d%02d%02d%03d%d', $birth_century, $birth_year, $birth_month, $birth_day->format('d'), $sequence_numb, $control_numb);    
    $personal_code = str_split($id_number);
    // $control_sum = 1 * $personal_code[0] + 2 * $personal_code[1] + 3 * $personal_code[2] + 4 * $personal_code[3] + 5 * $personal_code[4] + 6 * $personal_code[5] + 7 * $personal_code[6] + 8 * $personal_code[7] + 9 * $personal_code[8] + 1 * $personal_code[9];
    // $control_numb = ($control_sum % 11 == 10) ? 0 : $control_sum % 11;
    // $id_number .= $control_numb;
}while (in_array($id_number, $ids));

    $ids[] = $id_number;

    return $id_number;
}




function randString()
{
    $letters = range('a', 'z');
    $out = '';
    foreach(range(1, rand(3, 10)) as $_) {
        $out .= $letters[rand(0, count($letters) - 1 )];
    }
    
    return ucfirst($out);
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
    $balance = rand(0, 1000);
    return $balance;
}



$clients = array_map(fn($_) =>  [
    'id_number' => personalId(),
    'acc_number' => accNumber(),
    // 'name' => randString(),
    'surname' => randString(),
    // 'funds' => funds()
], range(1, 8));



$clients = array_map(function($client) {
    // $client['id_number'] = personalId();
    // $client['acc_number'] = accNumber();
    $client['name'] = randString();
    // $client['surname'] = randString();
    $client['funds'] = funds();
    return $client;
}, $clients);

usort($clients, fn($a, $b) => $a['surname'] <=> $b['surname']);
file_put_contents(__DIR__ . '/clients.ser', serialize($clients));
echo '<pre>';
print_r($clients);

?>