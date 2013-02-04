<?php
/**
 * https://wiki.php.net/rfc/foreachlist
 */
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$input = array(
    array(1, 2),
    array(3, 4),
    array(5, 6),
    array(7, 8, 9), // ok, will be processed only 7 and 8
    array(10), // noticed: undefined offset 1
);

foreach ($input as list($first, $second)) {
    echo $first . ' ' . $second . PHP_EOL;
}
