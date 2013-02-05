<?php
/**
 * Simple generator example
 */

function generateFiboSequence()
{
    $first = 0;
    $second = 1;
    
    while(true) {
        $new = $first + $second;
        echo 'GENERATOR SAID: ' . $new . PHP_EOL;
        yield $new;
        $first = $second;
        $second = $new;
    }
}

$fiboGen = generateFiboSequence();

foreach ($fiboGen as $n) {
    echo 'FOREACH SAID: ' . $n . PHP_EOL;
    if ($n > 100) {
        break;
    }
}

/*
//Will be an error, if you try to iterate over generator twice
foreach ($fiboGen as $n) {
    if ($n > 100) {
        break;
    }
    echo 'FOREACH SAID: ' . $n . PHP_EOL;
}
*/