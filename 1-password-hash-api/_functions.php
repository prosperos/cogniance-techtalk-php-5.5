<?php

function save_user_password($username, $password)
{
    /* Generating password hash */
    $hash = password_hash($password, PASSWORD_DEFAULT, getHashConfig());
    
    /* Storing into file */
    file_put_contents($username . '.txt', $hash);
}

function verify_user($username, $password)
{
    $path = $username . '.txt';
    if (!file_exists($path)) {
        return false;
    }
    $hash = file_get_contents($path);
    
    if (!password_verify($password, $hash)) {
        return false;
    }
    
    /* If salt / cost configuration changed -> needs rehash will be true */
    if (password_needs_rehash($hash, PASSWORD_DEFAULT, getHashConfig())) {
        save_user_password($username, $password);
    }
    
    return true;
}
