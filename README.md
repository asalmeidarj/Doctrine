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
    php commands\remover-aluno.php id
```

    Obs.: No comando acima onde lê-se id substitua pelo número de id desejado.

## Criando uma nova Entidade Telefone e relacionando com Aluno

- Crie um arquivo [Telefone.php](https://github.com/asalmeidarj/Doctrine/blob/main/src/Entity/Telefone.php) dentro do diretório src/Entity.
- A classe Telefone terá os atributos privados $id, $number e $aluno e os métodos públicos de getter e setter como pode ser visto no arquivo [Telefone.php](https://github.com/asalmeidarj/Doctrine/blob/main/src/Entity/Telefone.php).
- Note que é importante indicar para o Doctrine que a classe Telefone é uma entidade e será anexada na tabela Telefones com as seguintes anotações:
```
    /**
    * @ORM\Entity
    * @ORM\Table(name="Telefones")
    */
    class Telefone
    {
        //
    }
```

- Em seguida precisamos informar que id é uma PRIMARY KEY com AUTO INCREMENT e do tipo INTEGER com as seguintes anotações:
```
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;
```

- Precisamos informar os tipos dos atributos $number e $aluno e informar que existe um relacionamento
 de muitos para um (ManyToOne) entre Telefone e Aluno com as seguintes anotações:
```
    /**
     * @ORM\Column (type="string")
     */
    private $number;
    /**
     * @ORM\ManyToOne(targetEntity="Aluno")
     */
    private Aluno $aluno;
```

- Uma vez feito o mapeamento dentro da classe Telefone, precisamos criar os métodos addTelefone() e getTelefone() dentro da [classe Aluno](https://github.com/asalmeidarj/Doctrine/blob/main/src/Entity/Aluno.php).

- É necessário indicar para ORM que existe um relacionamento de um para muitos (OneToMany) entre Aluno e Telefone com as seguints anotações:
```
    /**
     * @ORM\OneToMany(targetEntity="Telefone", mappedBy="Aluno")
     */
    private $telefones;
```

- Caso o projeto ainda esteja em fase de desenvolvimento para atualizar o banco de dados basta fazer o update do esquema do banco de dados digitando no terminal:
```
    php vendor\bin\doctrine orm:schema-tool:update
```

Obs.: 
- o parâmetro targetEntity indica a Entidade alvo do relacionamento e o parâmetro mappedBy mostra atráves de qual entidade está sendo mapeado o relacionamento.
- Para melhor controle de versionamento do banco de dados precisamos usar o Doctrine Migrations.

## Instalando Doctrine Migrations com Composer

- Para iniciar a instalação do Doctrine Migrations com Composer, acesse o terminal e digite o comando:
```
    composer require doctrine/migrations
```

- Crie um diretório chamado Migrations dentro de src/.
- Crie um arquivo [migrations.php](https://github.com/asalmeidarj/Doctrine/blob/main/migrations.php) um nível acima do diretório src/.
- Crie um diretório chamado `Component` dentro de src/.
- Configure o arquivo [migrations.php](https://github.com/asalmeidarj/Doctrine/blob/main/migrations.php) com as seguintes instruções:

```
    <?php

    return [
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions',
        'version_column_name' => 'version',
        'version_column_length' => 1024,
        'executed_at_column_name' => 'executed_at',
        'execution_time_column_name' => 'execution_time',
    ],
 
    'migrations_paths' => [
        'Asalmeidarj\Doctrine\Migrations' => './src/Migrations',
        'Asalmeidarj\Doctrine\Component\Migrations' => './src/Component/Migrations',
    ],

    'all_or_nothing' => true,
    'check_database_platform' => true,
    'organize_migrations' => 'none',
    ];
```

Obs.: O trecho Asalmeidarj\Doctrine corresponde ao namespace escolhido  nas configurações iniciais
    do projeto. Vale ressaltar que no arquivo [composer.json](https://github.com/asalmeidarj/Doctrine/blob/main/composer.json) configuramos no Autoload com o namespace Asalmeidarj\Doctrine para apontar para pasta src/