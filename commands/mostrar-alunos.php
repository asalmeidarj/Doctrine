<?php

require_once 'vendor/autoload.php';


// Conectar ao banco de dados
$dataBasePath = __DIR__ . '/../var/data/banco.sqlite'; 
$pdo = new PDO('sqlite:' . $dataBasePath);


// Selecionar alunos
$statement = $pdo->query('SELECT * FROM Alunos;');
$listAlunos = $statement->fetchAll(PDO::FETCH_ASSOC);

// Mostrar alunos
foreach ($listAlunos as $aluno) {
    echo "Name: {$aluno['nome']}" .PHP_EOL;
}