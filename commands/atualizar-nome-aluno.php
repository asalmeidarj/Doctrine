<?php

use Asalmeidarj\Doctrine\Entity\Aluno;
use Asalmeidarj\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$novoNome = $argv[2];

/*
* Poderia ser feita a busca do aluno utilizando o repositório,
* porém traria todos os alunos da tabela o que seria desnecessário.
*
* Ex.:
*   $alunoRepository = $entityManager->getRepository(Aluno::class);
*   $aluno = $alunoRepository->find($id);
*
*/

$aluno  = $entityManager->find(Aluno::class, $id);
$aluno->setNome($novoNome);
$entityManager->flush();

