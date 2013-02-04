<?php
/**
 * What about returns in try{} block?
 */

function getSomething() {
    $something = 'Result to return';
    
    try {
        return $something; // <==== Attention
        
    } catch (Exception $objException) {
        // once upon a time...
        
    } finally {
        echo 'Finally called' . PHP_EOL;
    }
}

echo 'Before function call' . PHP_EOL;
echo getSomething() . PHP_EOL;
echo 'After function call' . PHP_EOL;
