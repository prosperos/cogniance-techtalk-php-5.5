<?php
/**
 * Like ... | grep "$pattern1" | grep "$pattern2"
 */

function output()
{
    while(true) {
        $line = yield;
        echo $line;
    }
}

function grep($pattern, $nextProcessor = null)
{
    if(is_null($nextProcessor)) {
        $nextProcessor = output();
    }
    
    echo "Grepping by $pattern" . PHP_EOL;
    while(true) {
        $line = yield;
        if (false !== strstr($line, $pattern)) {
            $nextProcessor->send($line);
        }
    }
}


$grep = grep('NetworkManager', grep('address'));

foreach (file('messages') as $line) {
    $grep->send($line);
}
