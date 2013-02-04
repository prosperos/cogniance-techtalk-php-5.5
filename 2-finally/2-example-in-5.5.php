<?php
/**
 * 5.5 way
 * 
 * https://wiki.php.net/rfc/finally
 * http://php.net/manual/en/language.exceptions.php
 */

$handle = fopen('test.txt', 'r');

try {
    while ($line = fgets($handle)) {
        echo $line;
        if ('BAD LINE' == trim($line)) {
            throw new DomainException('Incorrect data in test.txt');
        }
    }
} catch(Exception $objException) {
    echo 'Catch called' . PHP_EOL;
    throw $objException; // throw upwards
} finally {
    echo 'Finally called' . PHP_EOL;
    fclose($handle);
}
