<?php

namespace App\Contato;

use InvalidArgumentException;

class Telefone implements TelefoneInterface
{
    /** @var string */
    private string $telefone;

    /** @var string */
    private string $ddd;

    /**
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * @inheritDoc
     */
    public function setTelefone(string $telefone): void
    {
        if (self::validateTelefone($telefone)) {
            $this->telefone = $telefone;
        } else {
            throw new InvalidArgumentException("Por favor, informe um telefone válido como 999999999");
        }
    }

    /**
     * @param string $telefone
     * @return boolean
     */
    private function validateTelefone(string $telefone): bool
    {
        $regex = "/^[0-9]{9,11}$/";
        return preg_match($regex, $telefone) === 1;
    }

    /**
     * @inheritDoc
     */
    public function getDdd(): string
    {
        return "($this->ddd)";
    }

    /**
     * @inheritDoc
     */
    public function setDdd(string $ddd): void
    {
        if (self::validateDdd($ddd)) {
            $this->ddd = $ddd;
        } else {
            throw new InvalidArgumentException("Por favor, informe um DDD válido como 99");
        }
    }

    /**
     * @param string $ddd
     * @return boolean
     */
    private function validateDdd(string $ddd): bool
    {
        $regex = "/^[0-9]{2}$/";
        return preg_match($regex, $ddd) === 1;
    }

    /**
     * @inheritDoc
     */
    public function retornarNumeroCompleto(): string
    {
        return "($this->ddd) $this->telefone";
    }
}
