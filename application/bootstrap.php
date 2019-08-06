<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config    = Setup::createXMLMetadataConfiguration(array(__DIR__."/src/AppBundle/Resources/config/doctrine/"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'moneyapp',
	'host' => 'localhost',
);

// Obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);