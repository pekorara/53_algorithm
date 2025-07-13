<?php
$lines = explode(' ',readline());
$result = trim(r($lines));
echo $result . PHP_EOL;
$result = cal(explode(' ',$result));
echo $result;

function cal($lines){
    $stack = [];
    for ($i = 0; $i < count($lines); $i++) {
        $token = $lines[$i];
        if (is_numeric($token)){
            $stack[] = $token;
        }else{
            $first = array_pop($stack);
            $two = array_pop($stack);
            $result = match ($token){
                '+' => $first + $two,
                '-' => $first - $two,
                '*' => $first * $two,
                '/' => $first / $two,
                '^' => pow($first,$two)
            };
            $stack[] = $result;
        }
    }

    return $stack[0];
}

function r($lines)
{
    $stack = [];
    $result = '';
    for ($i = 0; $i < count($lines); $i++) {
        $token = $lines[$i];
        if (is_numeric($token)){
            $result = $result . ' ' . $token;
        }
        else if($token === '('){
            $stack[] = '(';
        }
        else if($token === ')'){
            while(count($stack) !== 0 && end($stack) !== '('){
                $result = $result . ' ' . array_pop($stack);
            }
            array_pop($stack);
        }
        else{
            while(count($stack) !== 0 && setLevel(end($stack)) > setLevel($token)){
                $result = $result . ' ' . array_pop($stack);
            }
            $stack[] = $token;
        }
    }

    while(count($stack) !== 0){
        $result = $result . ' ' . array_pop($stack);
    }

    return $result;
}

function setLevel($op){
    return match ($op){
        '+','-' => 1,
        '/','*' => 2,
        '^' => 3,
        default => -1
    };
}