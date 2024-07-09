<?php

namespace Contato;

use App\Contato\Telefone;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    /** @var Telefone */
    private Telefone $telefone;

    public function testSetTelefoneDefineUmTelefoneValido(): void
    {
        $this->telefone->setTelefone("999999999");
        $this->assertEquals("999999999", $this->telefone->getTelefone());
        $this->assertIsString($this->telefone->getTelefone());
    }

    public function testRetornarNumeroCompletoRetornaTelefoneEDdd(): void
    {
        $this->telefone->setDdd("11");
        $this->telefone->setTelefone("999999999");
        $this->assertEquals("(11) 999999999", $this->telefone->retornarNumeroCompleto());
    }

    public function testGetDddRetornaDdd(): void
    {
        $this->telefone->setDdd("11");
        $this->assertEquals("(11)", $this->telefone->getDdd());
    }

    public function testSetDddDefineDdd(): void
    {
        $this->telefone->setDdd("11");
        $this->assertEquals("(11)", $this->telefone->getDdd());
    }

    public function testGetTelefoneRetornaTelefone(): void
    {
        $this->telefone->setTelefone("999999999");
        $this->assertEquals("999999999", $this->telefone->getTelefone());
    }

    public function testSetTelefoneLancaExceptionAoInformarTelefoneInvalido(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Por favor, informe um telefone válido como 999999999");
        $this->telefone->setTelefone("99999999");
    }

    public function testSetDddLancaExceptionAoInformarDddInvalido(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Por favor, informe um DDD válido como 99");
        $this->telefone->setDdd("1");
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->telefone = new Telefone();
        $this->assertInstanceOf(Telefone::class, $this->telefone);
    }
}
