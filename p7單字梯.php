<?php
function ladderLength($beginWord, $endWord, $wordList) {
    $wordSet = array_flip($wordList);
    //如果 endWord 根本不在 wordList，那就不可能轉到終點，直接回傳 0
    if (!isset($wordSet[$endWord])) return 0;

    //bfs
    $queue = [[$beginWord, 1]];
    unset($wordSet[$beginWord]);

    while (!empty($queue)) {
        [$word, $level] = array_shift($queue);

        if ($word === $endWord) {
            return $level;
        }

        $chars = str_split($word);
        for ($i = 0; $i < strlen($word); $i++) {
            $originalChar = $chars[$i];
            for ($c = ord('a'); $c <= ord('z'); $c++) {
                $chars[$i] = chr($c);
                $newWord = implode('', $chars);
                if (isset($wordSet[$newWord])) {
                    array_push($queue, [$newWord, $level + 1]);
                    unset($wordSet[$newWord]);
                }
            }
            $chars[$i] = $originalChar;
        }
    }

    return 0;
}

[$start,$end] = explode(' ',readline());
$count = (int)readline();
$list = [];
for ($i = 0; $i < $count; $i++) {
    $list[] = readline();
}
echo ladderLength($start,$end,$list);