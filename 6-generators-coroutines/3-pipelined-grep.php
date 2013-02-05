<?php
/**
 * Like ... | grep "$pattern"
 * But clear implementation
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
    
    while(true) {
        $line = yield;
        if (false !== strstr($line, $pattern)) {
            $nextProcessor->send($line);
        }
    }
}

$grep = grep('NetworkManager');

foreach (file('messages') as $line) {
    $grep->send($line);
}
