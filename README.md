# Testes com PHPUNIT

Este repositório contém um exemplo de testes unitários com PHPUNIT e utiliza o Linux Ubuntu 24.04, php 8.3, composer
2.7.6 e phpunit
11.2-dev.

## Requisitos

Você precisa ter o php instalado em sua máquina. Você pode verificar a versão do php com o comando:

```bash
php -v
```

Caso você não tenha o php instalado, você pode instalar com o comando:

```bash
sudo add apt-repository ppa:ondrej/php
```

Confirme a instalação e depois atualize o repositório com o comando:

```bash
sudo apt-get update
```

E instalar o php com o comando:

```bash
sudo apt-get install php8.3
```

Para alterar a versão do php, você pode alterar o arquivo `composer.json` e mudar a versão do php para a versão
instalada em sua máquina.

```json
{
  "require": {
    "php": "^8.3"
  }
}
```

## Instalação do composer

Caso você não tenha o composer instalado, você pode baixá-lo
em [https://getcomposer.org/download/](https://getcomposer.org/download/)
Você pode verificar a versão do composer com o comando:

```bash
composer -V
```

## Instalação das dependências

Rode o comando abaixo para instalar as dependências:

```bash
composer install
```

## Instalação

Faça o download do PHPUNIT via composer com o comando:

```bash
composer require --dev phpunit/phpunit
```

## Configuração do PHPUNIT

Crie um arquivo de configuração chamado `phpunit.xml` na raiz do projeto com o seguinte conteúdo:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/11.2/phpunit.xsd" bootstrap="vendor/autoload.php"
         colors="true" testdox="true" stopOnFailure="false">
    <testsuites>
        <testsuite name="Testes">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
    <logging>
        <testdoxHtml outputFile="tests/phpunit/_output/testdox.html"/>
        <testdoxText outputFile="tests/phpunit/_output/testdox.txt"/>
    </logging>
    <coverage>
        <report>
            <html outputDirectory="tests/phpunit/_output/coverage-html"/>
        </report>
    </coverage>
    <source>
        <include>
            <directory>src</directory>
        </include>
    </source>
</phpunit>
```

Caso seja necessário validar o xml do arquivo, você pode utilizar o comando:

```bash
./vendor/bin/phpunit --migrate-configuration
```

## Executando os testes

Para executar os testes, basta rodar o comando:

```bash
./vendor/bin/phpunit
``` 

Executando os testes com o Xdebug:

```bash
XDEBUG_mode=coverage composer analyze-all
```  

## Scripts Personalizados

Você pode criar scripts personalizados no composer.json para facilitar a execução dos comandos. Exemplo:

```json
{
  "scripts": {
    "pre-test": "mkdir -p tests/phpunit/_output",
    "analyze": "phpstan analyse --level 7 src tests",
    "pipeline": "phpcs --standard=PSR12 src && phpcbf --standard=PSR12 src",
    "tests": "./vendor/bin/phpunit --bootstrap vendor/autoload.php --coverage-html tests/phpunit/_output/coverage-html",
    "analyze-all": "composer analyze && composer pipeline && composer tests"
  }
}
```

Para rodar os testes usando os scripts personalizados:

```bash
composer test
```

Ou, se preferir, você pode rodar usando o Xdebug com o comando:

```bash
XDEBUG_mode=coverage composer analyze-all
```

## Explicação das Verificações dos Testes

Os testes são verificados para garantir que o código esteja funcionando conforme esperado. Utilizamos o PHPUnit para
escrever e executar testes unitários. O arquivo de configuração phpunit.xml define como os testes serão executados e
onde os relatórios serão gerados.

TestDox: Gera uma saída amigável em HTML e texto que descreve os testes realizados.
Cobertura de Código: Gera relatórios de cobertura de código em HTML, permitindo visualizar quais partes do código foram
cobertas pelos testes.
Ajustes nas Chamadas de Comandos
Os scripts personalizados no composer.json permitem automatizar o processo de análise estática, formatação de código e
execução de testes. Isso ajuda a manter um fluxo de trabalho consistente e reduz erros humanos na execução manual de
múltiplos comandos.

- pre-test: Cria o diretório de saída para os relatórios de teste.
- analyze: Executa a análise estática do código com o PHPStan.
- pipeline: Executa verificações de estilo de código e corrige formatação com o PHPCS e PHPCBF.
- tests: Executa os testes unitários e gera relatórios de cobertura de código.
- analyze-all: Executa todas as etapas de análise, verificação de estilo e testes.

## Suítes de Teste
As suítes de teste são agrupamentos de testes que podem ser definidos no arquivo phpunit.xml. Isso permite organizar os
testes em categorias e executar grupos específicos conforme necessário.

No exemplo acima, a suíte de teste é definida como:

```xml

<testsuite name="Testes">
    <directory>tests</directory>
</testsuite>
```

Esta configuração informa ao PHPUnit para executar todos os testes localizados no diretório tests.

Espero que essas informações adicionais sejam úteis para entender melhor o processo de configuração e execução dos
testes no seu projeto!