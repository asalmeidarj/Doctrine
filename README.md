# Doctrine
Aprendendo Doctrine

## Programas necessários 

- PHP
- Composer

## Instalando Doctrine e iniciando o projeto

- Criar uma nova pasta para o projeto.
- Acesse a pasta do projeto pelo terminal e inicie o composer digitando:
    ```
        composer init
    ```
- Configure o arquivo composer.json:

`"autoload":`
```
    {
        "psr-4": {
            "Asalmeidarj\\Doctrine\\": "src/"
        }
    },

```

`"require":`

```
    {
        "doctrine/orm": "^2.6.2",
        "symfony/yaml": "2.*",
        "symfony/cache": "^5.3"
    }
```

- Após configurar o composer.json vá a linha de comando e digite `composer install` .
- Crie o diretório Helper dentro de src .
- Crie a [classe EntityManagerFactory](https://github.com/asalmeidarj/Doctrine/blob/main/src/Helper/EntityManagerFactory.php) dentro da pasta Helper.
- Digite no terminal: `composer dumpautoload`
- Criar um arquivo [teste.php](https://github.com/asalmeidarj/Doctrine/blob/main/teste.php) para testar a classe EntityManagerFactory.

## Gerando o Esquema de Banco de Dados

- Crie o arquivo cli-config.php na pasta um nível acima de src/.
- Configure o arquivo [cli-config.php](https://github.com/asalmeidarj/Doctrine/blob/main/cli-config.php)
- No terminal use o comando `php vendor\bin\doctrine list`. Se estiver tudo ok, irá aparecer uma lista de comandos do doctrine.
- Crie o diretório Entity dentro de src/
- Crie a [classe Aluno](https://github.com/asalmeidarj/Doctrine/blob/main/src/Entity/Aluno.php) dentro de Entity.
- Use o comando `php vendor\bin\doctrine orm:info`. Se estiver tudo ok, irá reconhecer a classe Aluno.
- Use o comando `php vendor\bin\doctrine orm:mapping:describe Aluno` para visualizar algumas informações sobre a classe Aluno.

## Criando tabela com Doctrine

- Após o mapeamento da classe Aluno, digite no terminal o comando:
    `php vendor\bin\doctrine orm:schema-tool:create`

## Usando o método persist e flush 

- Crie um diretório commands na pasta um nível acima de src/.
- Dentro do diretório commands/ crie um arquivo [criar-aluno.php](https://github.com/asalmeidarj/Doctrine/blob/main/commands/criar-aluno.php).
- Crie uma cópia de criar-aluno.php e renomeie para [insert-aluno.php](https://github.com/asalmeidarj/Doctrine/blob/main/commands/insert-aluno.php) . 
- Abra o arquivo insert-aluno.php
- Altere a instruçao `$aluno->setNome('Daniel Louro Costa');` para `$aluno->setNome($argv[1]);` . Desta forma será possível inserir os alunos com o seguinte comando no terminal:
    ```
        php commands\insert-aluno.php "NOME DO ALUNO"
    ```

## Usando os métodos findAll, find, findBy e findOneBy

- Crie um arquivo [buscar-alunos.php](https://github.com/asalmeidarj/Doctrine/blob/main/commands/buscar-alunos.php) dentro do diretório commands.
- Insira alguns alunos no banco de dados e teste o arquivo buscar-alunos.php.
```
    OBS.: Utilize as funções dentro de buscar-alunos.php e faça uma 
    implementação de acordo com a sua necessidade.
```

## Atualizando um dado utilizando o método find de EntityManagerInterface

- Crie um arquivo [atualizar-nome-aluno.php](https://github.com/asalmeidarj/Doctrine/blob/main/commands/atualizar-nome-aluno.php) dentro do diretório commands.
- Após criar o arquivo atualize o nome de um aluno pelo terminal digitando:
```
    php commands\atualizar-nome-aluno.php 1 "Frederico"
```
- Após atualizar o nome do aluno de id = 1 para "Frederico" verifique digitando no terminal:
```
    php commands\mostrar-alunos.php
```

## Removendo um objeto com o método remove de EntityManagerInterface

- Crie um arquivo [remover-aluno.php](https://github.com/asalmeidarj/Doctrine/blob/main/commands/remover-aluno.php) dentro do diretório commands.
- Após criar o arquivo remover-aluno.php poderá remover um aluno pelo id digitando no terminal:
```
    php commands\remover-aluno.php
```
