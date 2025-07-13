<?php
$sum = (int)readline();
readline();
$list = explode(' ',readline());
rsort($list);
$count = 0;
foreach ($list as $data){
    if($sum >= $data){
        $count += (int)($sum / $data);
        $sum%=$data;
    }
}

echo $count;