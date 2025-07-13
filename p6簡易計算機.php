<?php

$lines = explode(' ',readline());
$result = trim(r($lines));
echo $result . PHP_EOL;
$result = cal(explode(' ',$result));
echo floor($result * 100) / 100;

function r($lines){
    $stack = [];
    $result = '';
    for ($i = count($lines)-1; $i >= 0 ; $i--) {
        $token = $lines[$i];
        if(is_numeric($token)){
            $result = $token . ' ' . $result;
        }
        else if($token === ')'){
            $stack[] = $token;
        }
        else if($token === '('){
            while(count($stack) > 0 && end($stack) !== ')'){
                $result = array_pop($stack) . ' ' . $result;
            }
            array_pop($stack);
        }
        else{
            while(count($stack) > 0 && getLevel(end($stack)) > getLevel($token)){
                $result = array_pop($stack) . ' ' . $result;
            }
            $stack[] = $token;
        }
    }

    while(count($stack) !== 0){
        $result = array_pop($stack) . ' ' . $result;
    }

    return $result;
};

function getLevel($op){
    return match ($op){
        '+' , '-' => 1,
        '*' , '/' => 2,
        '^' => 3,
        default => -1
    };
};

function cal($lines){
    $stack = [];
    for ($i = count($lines) - 1; $i >= 0 ; $i--) {
        $token = $lines[$i];
        if (is_numeric($token)){
            $stack[] = (int)$token;
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

//function r($tokens) {
//    $stack = [];
//    $result = '';
//
//    for ($i = count($tokens) - 1; $i >= 0; $i--) {
//        $token = $tokens[$i];
//        if (is_numeric($token)) {
//            $result = $token . ' ' . $result;
//        } else if ($token === ')') {
//            $stack[] = $token;
//        } else if ($token === '(') {
//            while (end($stack) !== ')') {
//                $op = array_pop($stack);
//                $result = $op . ' ' . $result;
//            }
//            array_pop($stack);
//        } else {
//            while (count($stack) > 0 && getLevel(end($stack)) > getLevel($token)) {
//                $op = array_pop($stack);
//                $result = $op . ' ' . $result;
//            }
//            $stack[] = $token;
//        }
//    }
//
//    while (count($stack) > 0) {
//        $op = array_pop($stack);
//        $result = $op . ' ' . $result;
//    }
//
//    return trim($result);
//}
//
//function getLevel($op){
//    return match ($op) {
//        '-', '+' => 1,
//        '/', '*' => 2,
//        '^' => 3,
//        default => -1,
//    };
//}
//$input = readline();
//$tokens = explode(' ', $input);
//$prefixStr = trim(r($tokens));
//echo "$prefixStr\n";
//
//function evalPrefixString($exprStr) {
//    $tokens = explode(' ', trim($exprStr));
//    $stack = [];
//    for ($i = count($tokens) - 1; $i >= 0; $i--) {
//        $token = $tokens[$i];
//        if (is_numeric($token)) {
//            $stack[] = (int)$token;
//        } else {
//            $a = array_pop($stack);
//            $b = array_pop($stack);
//            switch ($token) {
//                case '+': $stack[] = $a + $b; break;
//                case '-': $stack[] = $a - $b; break;
//                case '*': $stack[] = $a * $b; break;
//                case '/': $stack[] = $a / $b; break;
//                case '^': $stack[] = pow($a, $b); break;
//            }
//        }
//    }
//    return $stack[0];
//}
//
//$result =floor(evalPrefixString($prefixStr) * 100) / 100;
//echo "Result: $result\n";