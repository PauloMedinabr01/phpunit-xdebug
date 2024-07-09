<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Contato\Email;
use App\Contato\Telefone;
use App\Pessoa\Aluno;

try {
    $email = new Email();
    $email->setEmail("paulo@email.com");
    print "Email válido: " . $email->getEmail() . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo "<br><br>";

try {
    $telefone = new Telefone();
    $telefone->setDdd("11");
    $telefone->setTelefone("999999999");
    print "Telefone válido: " . $telefone->getDdd() . " " . $telefone->getTelefone() . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo "<br><br>";

try {
    $emailAluno = new Email();
    $emailAluno->setEmail("aluno@example.com");

    $telefoneAluno = new Telefone();
    $telefoneAluno->setDdd("11");
    $telefoneAluno->setTelefone("987654321");

    $aluno = new Aluno();
    $aluno->setNome("Paulo Salvatore");
    $aluno->setEmail($emailAluno);
    $aluno->setTelefone($telefoneAluno);

    echo $aluno->retornarAluno();
} catch (InvalidArgumentException $e) {
    echo "Erro ao criar aluno: " . $e->getMessage();
}
