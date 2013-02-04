<?php
/**
 * https://wiki.php.net/rfc/empty_isset_exprs
 */

function getArray() {
    return array();
}

if (empty(getArray())) {
    echo 'is empty result';
}

/*
Still won't work!

if (!isset(getArray())) {
    echo 'is not set';
}
*/