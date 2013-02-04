<?php
/**
 * 5.4 way
 */

$handle = fopen('test.txt', 'r');

try {
    while ($line = fgets($handle)) {
        echo $line;
        if ('BAD LINE' == trim($line)) {
            throw new DomainException('Incorrect data in test.txt');
        }
    }

    fclose($handle); // We should add "fclose" in both try...
} catch(Exception $objException) {
    fclose($handle); // ... and catch cases
    
    // Pay attention, we throw an exception upwards, 
    // so the code after catch will be never called
    throw $objException;
}
