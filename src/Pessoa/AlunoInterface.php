<?php

namespace App\Pessoa;

use App\Contato\Email;
use App\Contato\Telefone;
use InvalidArgumentException;

/**
 * Class Aluno
 * @package App\Pessoa
 */
interface AlunoInterface
{
    /**
     * @return string
     */
    public function retornarAluno(): string;

    /**
     * @return string
     */
    public function getNome(): string;

    /**
     * @param string $nome
     * @return void
     */
    public function setNome(string $nome): void;

    /**
     * @return Email
     */
    public function getEmail(): Email;

    /**
     * @param Email $email
     * @return void
     */
    public function setEmail(Email $email): void;

    /**
     * @return Telefone|null
     */
    public function getTelefone(): ?Telefone;

    /**
     * @param Telefone|null $telefone
     * @return void
     * @throws InvalidArgumentException
     */
    public function setTelefone(Telefone $telefone = null): void;
}
