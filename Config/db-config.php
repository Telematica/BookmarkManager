<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__.'/Entity/');
$isDevMode = true;

// the connection configuration
$dbParams = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/../Database/data.db'
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$logger = new \Doctrine\DBAL\Logging\DebugStack();
$config->setSQLLogger($logger);
$entityManager = EntityManager::create($dbParams, $config);