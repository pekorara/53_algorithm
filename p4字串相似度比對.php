<?php
$one = readline();
$two = readline();
$dp = [];
$oneLen = strlen($one);
$twoLen = strlen($two);
for ($i = 0; $i <= $oneLen; $i++) {
    $dp[$i][0] = $i;
}

for ($i = 0; $i <= $twoLen; $i++) {
    $dp[0][$i] = $i;
}

for ($i = 1; $i <= $oneLen; $i++) {
    for ($j = 1; $j <= $twoLen; $j++) {
        $cost = $one[$i - 1] === $two[$j - 1] ? 0 : 1;
        $dp[$i][$j] = min($dp[$i-1][$j]+1,min($dp[$i][$j-1]+1,$dp[$i-1][$j-1] + $cost));
    }
}

echo $dp[$oneLen][$twoLen];
