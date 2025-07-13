<?php
$list = [];
for($i = 0; $i < 15; $i++){
    $line = str_split(trim(readline()));
    $list[] = $line;
}

for ($i = 0; $i < 15; $i++) {
    for ($j = 0; $j < 15; $j++) {
        if($list[$i][$j] !== '-' && check($i,$j)){
            echo $list[$i][$j];
            exit;
        }
    }
}

echo '?';

function check($i,$j)
{
    global $list;
    if(isset($list[$i][$j + 1]) && isset($list[$i][$j + 2]) && isset($list[$i][$j - 1]) && isset($list[$i][$j - 2])){
        if(($list[$i][$j + 1] === $list[$i][$j]) &&
            ($list[$i][$j + 2] === $list[$i][$j]) &&
            ($list[$i][$j - 1] === $list[$i][$j]) &&
            ($list[$i][$j - 2] === $list[$i][$j])){
            return true;
        }
    }

    if(isset($list[$i + 1][$j]) && isset($list[$i + 2][$j]) && isset($list[$i - 1][$j]) && isset($list[$i - 2][$j])){
        if(($list[$i + 2][$j] === $list[$i][$j]) &&
            ($list[$i + 1][$j] === $list[$i][$j]) &&
            ($list[$i - 1][$j] === $list[$i][$j]) &&
            ($list[$i - 2][$j] === $list[$i][$j])){
            return true;
        }
    }

    if(isset($list[$i - 1][$j + 1]) && isset($list[$i - 2][$j + 2]) && isset($list[$i + 1][$j - 1]) && isset($list[$i + 2][$j - 2])){
        if(($list[$i - 1][$j + 1] === $list[$i][$j]) &&
            ($list[$i - 2][$j + 2] === $list[$i][$j]) &&
            ($list[$i + 1][$j - 1] === $list[$i][$j]) &&
            ($list[$i + 2][$j - 2] === $list[$i][$j])){
            return true;
        }
    }

    if(isset($list[$i - 1][$j - 1]) && isset($list[$i - 2][$j - 2]) && isset($list[$i + 1][$j + 1]) && isset($list[$i + 2][$j + 2])){
        if(($list[$i - 1][$j - 1] === $list[$i][$j]) &&
            ($list[$i - 2][$j - 2] === $list[$i][$j]) &&
            ($list[$i + 1][$j + 1] === $list[$i][$j]) &&
            ($list[$i + 2][$j + 2] === $list[$i][$j])){
            return true;
        }
    }

    return false;
}