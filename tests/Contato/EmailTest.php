<?php

namespace Contato;

use App\Contato\Email;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /** @var Email */
    private Email $email;

    public function testGetEmailRetornaEmail(): void
    {
        $this->email->setEmail("teste@email.com");
        $this->assertEquals("teste@email.com", $this->email->getEmail());
        $this->assertIsString($this->email->getEmail());
    }

    public function testSetEmailDefineEmailValido(): void
    {
        $this->email->setEmail("teste@email.com");
        $this->assertEquals("teste@email.com", $this->email->getEmail());
    }

    public function testSetEmailLancaExceptionAoInformarEmailInvalido(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Por favor, informe um e-mail válido como exemplo@email.com");
        $this->email->setEmail("teste@email.");
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->email = new Email();
        $this->assertInstanceOf(Email::class, $this->email);
    }
}
