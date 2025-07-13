<?php
function recursive($n){
    static $m = [];
    if ($n === 0) return 1;
    if($n < 0) return 0;
    if(isset($m[$n])) return $m[$n];
    $m[$n] = recursive($n-1) + recursive($n-2) + recursive($n-3);
    return $m[$n];
}

echo recursive((int)readline());
