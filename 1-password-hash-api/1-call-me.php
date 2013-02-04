<?php
/**
 * Details:
 * https://wiki.php.net/rfc/password_hash
 * 
 * Creates the user on "register" command: saves the user record into $username.txt
 * Validates on "login" command (and rehash the password on "login" stage if needed)
 * 
 * How to use?
 * 
 * Register
 * # php 1-call-me.php register ekovalenja password123456   --- output: User registered successfully
 * 
 * Login
 * # php 1-call-me.php login ekovalenja password123456      --- output: User ekovalenja logged in.
 * 
 * Try to Login with invalid credentials
 * # php 1-call-me.php login ekovalenja invalid-value       --- output: User ekovalenja: invalid password
 * 
 * Then print the saved hash and remember it
 * # php 1-call-me.php showhash ekovalenja  --- output: HASH: $2y$04$01234567890123456789quPyC/OW5iKuC9EAyJ9wa8Gt8NU13IzJG
 * 
 * Then change the cost in the _config.php and analyze the changes
 * 
 * It is the most transparent way to rehash passwords inside your application
 * 
 */

require_once('_config.php');
require_once('_functions.php');

$username = @$_SERVER['argv'][2];
$password = @$_SERVER['argv'][3];

switch(@$_SERVER['argv'][1]) {
    case 'register':
        save_user_password($username, $password);
        echo 'User registered successfully' . PHP_EOL;
        break;
    case 'login':
        if (verify_user($username, $password)) {
            echo 'User ' . $username . ' logged in.' . PHP_EOL;
        } else {
            echo 'User ' . $username . ': invalid password' . PHP_EOL;
        }
        break;
    case 'showhash':
        echo 'HASH: ' . file_get_contents($username . '.txt') . PHP_EOL;
        break;
    default:
        throw new \DomainException('Invalid command. Use register or login.');
}
