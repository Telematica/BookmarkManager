<?php

require_once 'vendor/autoload.php';
require_once 'Config/db-config.php';

error_reporting(E_ALL);
ini_set('html_errors', true);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header('Content-Type:application/json; charset=UTF-8');



$headers = getallheaders();

if (array_key_exists('X-Requested-With', $headers) and 'XMLHttpRequest' === $headers['X-Requested-With']) {
    #http://stackoverflow.com/questions/19004783/reading-json-post-using-php
    #http://stackoverflow.com/questions/18866571/receive-json-post-with-php
    $data = json_decode(file_get_contents('php://input'), true)['urls'];

    $import = new \App\Import($entityManager);
    print json_encode($import->import($data));
    header('HTTP/1.1 200 Unauthorized', true, 200);
} else {
    
}

/*
var xhr = new XMLHttpRequest();
xhr.onload = function (a) { 
    if (xhr.status === 200) {
        console.log(xhr.responseText);
    } 
};

xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.reponseText);
    }
};

xhr.__proto__.sendReq = function () {
    var data = { urls: ['https://a.com']};
    this.open('POST','http://localhost/BookmarkManager/');
    this.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    this.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
    this.send(JSON.stringify(data));
};
*/