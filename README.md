# Doctrine
Aprendendo Doctrine

## Programas necessários 

- PHP
- Composer

## Instalando Doctrine e iniciando o projeto

- Criar uma nova pasta para o projeto.
- Acesse a pasta do projeto pelo terminal e inicie o composer (comando "composer init").
- Configure o arquivo composer.json:

    "autoload": {
        "psr-4": {
            "Asalmeidarj\\Doctrine\\": "src/"
        }
    },

    "require": {
        "doctrine/orm": "^2.6.2",
        "symfony/yaml": "2.*",
        "symfony/cache": "^5.3"
    }

- Após configurar o composer.json vá a linha de comando e digite "composer install".
- Crie o diretório Helper dentro de src .
- Crie a classe EntityManagerFactory dentro da pasta Helper .
- Digite no terminal: composer dumpautoload
- Cria um arquivo teste.php para testar a classe EntityManagerFactory.



