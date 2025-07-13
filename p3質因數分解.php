<?php
$result = [];
$count = (int)readline();
for ($i = 0; $i < $count; $i++) {
    $num = (int)readline();
    $list = [];
    for ($j = 2; $j <= sqrt($num); $j++) {
        while($num % $j == 0){
            $list[$j] = ($list[$j] ?? 0) + 1;
            $num /= $j;
        }
    }
    if ($num > 1) {
        $list[$num] = 1;
    }
    $str = '';
    foreach($list as $k => $v){
        $str .= $v === 1 ? $k . '*' : $k . '^' . $v . '*';
    }
    $str = trim($str,'*');
    $result[] = $str;
}

foreach ($result as $data){
    echo $data . PHP_EOL;
}