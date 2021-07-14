<?php

namespace Asalmeidarj\Doctrine\Helper;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        // Create a simple "default" Doctrine ORM configuration for Annotations
        $rootDir = __DIR__ . '/../..';
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array($rootDir . "/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
        // or if you prefer yaml or XML
        // $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        // $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

        // database configuration parameters
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite',
        );

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }
}