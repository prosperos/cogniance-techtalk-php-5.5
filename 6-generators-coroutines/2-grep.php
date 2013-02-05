<?php
/**
 * Like cat messages | grep "$pattern"
 */

function grep($pattern)
{
    echo "Grepping by $pattern" . PHP_EOL;
    while(true) {
        $line = yield;
        if (false !== strstr($line, $pattern)) {
            echo $line;
        }
    }
}

$grep = grep('NetworkManager');

foreach (file('messages') as $line) {
    $grep->send($line);
}
