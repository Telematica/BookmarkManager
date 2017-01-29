<?php
// bootstrap.php
// Include Composer Autoload (relative to project root).
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;  

require_once "../vendor/autoload.php";

$paths = array(__DIR__.'/Entity/');
$isDevMode = true;

// the connection configuration
$dbParams = array(
	'driver' => 'pdo_sqlite',
	'path' => __DIR__ . '/data.db'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);

$logger = new \Doctrine\DBAL\Logging\EchoSQLLogger();
$config->setSQLLogger($logger);

//AnnotationRegistry::registerFile("vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php");
//AnnotationRegistry::registerAutoloadNamespace("\Entity", "Entity/");
//AnnotationRegistry::registerAutoloadNamespace("MyProject\Annotations", ROOT.DS.'www');
$db = $entityManager->getConnection();

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
//    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));