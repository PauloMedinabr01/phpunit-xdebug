<?php

namespace Pessoa;

use App\Contato\Email;
use App\Contato\Telefone;
use App\Pessoa\Aluno;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    /** @var Aluno */
    private Aluno $aluno;

    /** @var Telefone */
    private Telefone $telefone;

    /** @var Email */
    private Email $email;

    public function testGetTelefoneRetornaNumeroCompletoDoAluno(): void
    {
        $this->telefone->setDdd("11");
        $this->telefone->setTelefone("999999999");

        $this->aluno->setTelefone($this->telefone);
        $this->assertEquals("(11) 999999999", $this->aluno->getTelefone()->retornarNumeroCompleto());
    }

    public function testSetEmail(): void
    {
        $this->email->setEmail("aluno@email.com");

        $this->aluno->setEmail($this->email);

        $this->assertEquals("aluno@email.com", $this->email->getEmail());
        $this->assertInstanceOf(Email::class, $this->aluno->getEmail());
    }

    public function testGetNome(): void
    {
        $this->aluno->setNome("Paulo Salvatore");
        $this->assertEquals("Paulo Salvatore", $this->aluno->getNome());
    }

    public function testValidarNome(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nome e sobrenome devem ter pelo menos duas letras.");

        $this->aluno->setNome("Paulo A");
    }

    public function testGetEmail(): void
    {
        $this->email->setEmail("aluno@email.com");

        $this->aluno->setEmail($this->email);

        $this->assertEquals("aluno@email.com", $this->aluno->getEmail()->getEmail());
    }

    public function testSetNome(): void
    {
        $this->aluno->setNome("Paulo Salvatore");

        $this->assertEquals("Paulo Salvatore", $this->aluno->getNome());
        $this->assertIsString($this->aluno->getNome());
    }

    public function testSetNomeLancaExceptionComNomeInvalido(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nome e sobrenome devem ter pelo menos duas letras.");

        $this->aluno->setNome("Paulo A");
    }

    public function testSetTelefone(): void
    {
        $this->telefone->setDdd("11");
        $this->telefone->setTelefone("999999999");

        $this->aluno->setTelefone($this->telefone);

        $this->assertEquals("(11)", $this->aluno->getTelefone()->getDdd());
        $this->assertIsString($this->aluno->getTelefone()->getDdd());
    }

    public function testSetTelefoneComTelefoneNulo(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Por favor, informe um telefone válido como 999999999");

        $this->aluno->setTelefone(null);
    }

    public function testSetTelefoneComTelefoneInvalido(): void
    {
        $this->telefone->setDdd("11");

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Por favor, informe um telefone válido como 999999999");

        $this->telefone->setTelefone("97535810");

        $this->aluno->setTelefone($this->telefone);
    }

    public function testSetTelefoneComDddInvalido(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Por favor, informe um DDD válido como 99");
        $this->telefone->setDdd("1");
    }

    public function testRetornarAluno(): void
    {
        $this->email->setEmail("aluno@email.com");

        $this->telefone->setDdd("11");
        $this->telefone->setTelefone("987654321");

        $this->aluno->setNome("Paulo Salvatore");
        $this->aluno->setEmail($this->email);
        $this->aluno->setTelefone($this->telefone);

        $resultadoEsperado = "Nome do Aluno: Paulo Salvatore<br>" .
            "Email do Aluno: aluno@email.com<br>" .
            "Telefone do Aluno: (11) 987654321<br>";

        $this->assertEquals($resultadoEsperado, $this->aluno->retornarAluno());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->aluno = new Aluno();
        $this->assertInstanceOf(Aluno::class, $this->aluno);
        $this->telefone = new Telefone();
        $this->assertInstanceOf(Telefone::class, $this->telefone);
        $this->email = new Email();
        $this->assertInstanceOf(Email::class, $this->email);
    }
}
