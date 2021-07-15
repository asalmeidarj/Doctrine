# Doctrine
Aprendendo Doctrine

## Programas necessários 

- PHP
- Composer

## Instalando Doctrine e iniciando o projeto

- Criar uma nova pasta para o projeto.
- Acesse a pasta do projeto pelo terminal e inicie o composer (comando "composer init").
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

- Após configurar o composer.json vá a linha de comando e digite "composer install".
- Crie o diretório Helper dentro de src .
- Crie a classe EntityManagerFactory dentro da pasta Helper .
- Digite no terminal: composer dumpautoload
- Criar um arquivo teste.php para testar a classe EntityManagerFactory.

## Gerando o Esquema de Banco de Dados

- Crie o arquivo cli-config.php na pasta um nível acima de src/.
- Configure o arquivo cli-config.php
- No terminal use o comando "php vendor\bin\doctrine list". Se estiver tudo ok, irá aparecer uma lista de comandos do doctrine.
- Crie o diretório Entity dentro de src/
- Crie a classe Aluno dentro de Entiy
- Use o comando "php vendor\bin\doctrine orm:info". Se estiver tudo ok, irá reconhecer a classe Aluno.
- Use o comando "php vendor\bin\doctrine orm:mapping:describe Aluno" para visualizar algumas informações sobre a classe Aluno.

## Criando tabela com Doctrine

- Após o mapeamento da classe Aluno, digite no terminal o comando:
    php vendor\bin\doctrine orm:schema-tool:create


## Usando o método persist e flush 

- Crie um diretório commands na pasta um nível acima de src/.
- Dentro do diretório commands/ crie um arquivo [criar-aluno.php](https://github.com/asalmeidarj/Doctrine/blob/main/commands/criar-aluno.php)

**OBS.: clique em criar-aluno.php para ver o script pronto.





