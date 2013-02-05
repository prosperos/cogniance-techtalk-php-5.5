<?php
/**
 * Like ... | grep "$pattern1" | grep -A 2 "$pattern2"
 */

function output()
{
    while(true) {
        $line = yield;
        echo $line;
    }
}

function grep($pattern, $nextProcessor = null, $linesAfter = 0)
{
    if(is_null($nextProcessor)) {
        $nextProcessor = output();
    }
    
    echo "Grepping by $pattern" . PHP_EOL;

    while(true) {
        $line = yield;
        if (false !== strstr($line, $pattern)) {
            $nextProcessor->send($line);
            for($i = 0 ; $i < $linesAfter ; $i++) {
                $nextProcessor->send(yield);
            }
            if ($i > 0) { print '--' . PHP_EOL; }
        }
    }
}

$grep = grep('NetworkManager', grep('address', null, 2));

echo memory_get_peak_usage() . PHP_EOL;

foreach (file('messages') as $line) {
    $grep->send($line);
}

echo memory_get_peak_usage() . PHP_EOL;
