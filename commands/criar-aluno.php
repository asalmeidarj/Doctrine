<?php

use \Asalmeidarj\Doctrine\Entity\Aluno;
use Asalmeidarj\Doctrine\Helper\EntityManagerFactory;

require_once  __DIR__ . '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome('Daniel Louro Costa');

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$entityManager->persist($aluno);

$entityManager->flush();


