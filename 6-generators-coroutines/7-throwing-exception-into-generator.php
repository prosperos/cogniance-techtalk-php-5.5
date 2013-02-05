<?php
/**
 * Simple throwing of exception into generator
 * 
 * Uncomment the line $gen->throw and compare results
 */

function myGenerator($n, $step)
{
    try {
        while(true) {
            yield $n += $step;
        }
    } catch (Exception $objException) {
        echo $objException->getMessage();
    }
    
}

$gen = myGenerator(1, 5);

foreach ($gen as $n) {
    if ($n >= 200) {
        break;
    }
    echo $n . PHP_EOL;
    //$gen->throw(new Exception('Test Message of Exception'));
}
