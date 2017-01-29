<?php

require_once 'vendor/autoload.php';
require_once 'Config/db-config.php';

$import = new \App\Import($entityManager);
$import->import();