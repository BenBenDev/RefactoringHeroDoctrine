<?php
// Doctrine configuration
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array("src/Entity"), $isDevMode);

// database configuration parameters
$conn = [
    'dbname' => 'super_hero',
    'user' => 'root',
    'password' => 'root',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
];

$em = EntityManager::create($conn, $config);
