<?php

namespace App\Contato;

use InvalidArgumentException;

interface TelefoneInterface
{
    /**
     * @return string
     */
    public function getTelefone(): string;

    /**
     * @param string $telefone
     * @return void
     * @throws InvalidArgumentException
     */
    public function setTelefone(string $telefone): void;

    /**
     * @return string
     */
    public function getDdd(): string;

    /**
     * @param string $ddd
     * @return void
     * @throws InvalidArgumentException
     */
    public function setDdd(string $ddd): void;

    /**
     * @return string
     */
    public function retornarNumeroCompleto(): string;
}
