<?php
/**
 * Representation of nested throwing/catching/finally calls.
 */

try {
    try {
        throw new Exception('first exception called');
    } catch (Exception $e) {
        echo 'first catch' . PHP_EOL;
        throw $e;
    } finally {
        echo 'first finally' . PHP_EOL;
    }
} catch (Exception $e) {
    echo 'second catch' . PHP_EOL;
} finally {
    echo 'second finally' . PHP_EOL;
}

echo 'done';
