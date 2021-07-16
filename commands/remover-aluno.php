|<?php

use Asalmeidarj\Doctrine\Entity\Aluno;
use Asalmeidarj\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

//Iniciando conexão com o banco atráves do Doctrine
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//Recebe o id através do terminal.
$id = $argv[1];

//Busca o aluno no banco de dados.
$aluno = $entityManager->getReference(Aluno::class, $id);

// Prepara a instrução de remover o aluno.
$entityManager->remove($aluno);

// Executa a instrução (remove o aluno).
$entityManager->flush();


/*
    Por questão de performance para evitar duas consultas ao banco de dados,
    utilizamos o método getReference em vez do método find.
*/
