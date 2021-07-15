<?php

use Asalmeidarj\Doctrine\Entity\Aluno;
use Asalmeidarj\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/**
 * #var Aluno[] $alunoList
 */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    echo "ID: {$aluno->getId()}" . PHP_EOL . 
    "Nome: {$aluno->getNome()}" . PHP_EOL . PHP_EOL;
}

//método find faz busca pelo id
$daniel = $alunoRepository->find(1);
echo "Aluno {$daniel->getNome()}" . PHP_EOL . PHP_EOL;


// método findBy faz uma busca por atributo e 
// retorna uma array com todos os objetos 
// com o mesmo valor de atributo definido
$alessandro = $alunoRepository->findBy([
    'nome' => 'Alessandro Almeida'
]);
echo "Buscou aluno {$alessandro[0]->getNome()} com método findBy" . PHP_EOL . PHP_EOL;


//O método findOneBy retorna um único objeto
$alessandro = $alunoRepository->findOneBy([
    'nome' => 'Alessandro Almeida'
]);
echo "Buscou aluno {$alessandro->getNome()} com método findOneBy" . PHP_EOL;

//Um pouco mais sobre findBy (ORDER BY do SQL)
$alunos = $alunoRepository->findBy([], ['nome' => 'ASC'], 4, 3 );

echo "Retorna 4 alunos por ordem crescente de nome a partir da 3 linha:" . PHP_EOL;
foreach($alunos as $aluno){
    echo "Nome: {$aluno->getNome()}" . PHP_EOL;
}
