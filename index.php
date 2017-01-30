<?php

require_once 'vendor/autoload.php';
require_once 'Config/db-config.php';

ini_set('html_errors', true);

/*
$headers = getallheaders();

if (array_key_exists('X-Requested-With', $headers) and 'XMLHttpRequest' === $headers['X-Requested-With']) {

} else {
    
}
*/

$import = new \App\Import($entityManager);
$import->import();
