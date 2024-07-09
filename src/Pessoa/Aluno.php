<?php

namespace App\Pessoa;

use App\Contato\Email;
use App\Contato\Telefone;
use InvalidArgumentException;

/**
 * Class Aluno
 * @package App\Pessoa
 */
class Aluno implements AlunoInterface
{
    /** @var string */
    private string $nome;

    /** @var Email */
    private Email $email;

    /** @var Telefone */
    private Telefone $telefone;

    /**
     * @inheritDoc
     */
    public function retornarAluno(): string
    {
        return "Nome do Aluno: " . $this->getNome() . "<br>" .
            "Email do Aluno: " . $this->getEmail()->getEmail() . "<br>" .
            "Telefone do Aluno: " . $this->getTelefone()->retornarNumeroCompleto() . "<br>";
    }

    /**
     * @inheritDoc
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @inheritDoc
     */
    public function setNome(string $nome): void
    {
        if ($this->validarNome($nome)) {
            $this->nome = $nome;
        }
    }

    /**
     * @param string $nome O nome a ser validado.
     * @return bool
     * @throws InvalidArgumentException Se o nome não for válido.
     */
    private function validarNome(string $nome): bool
    {
        $partesNome = explode(' ', $nome);

        foreach ($partesNome as $parte) {
            if (strlen(preg_replace('/[^a-zA-Z]/', '', $parte)) < 2) {
                throw new InvalidArgumentException("Nome e sobrenome devem ter pelo menos duas letras.");
            }
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Telefone|null
     */
    public function getTelefone(): ?Telefone
    {
        return $this->telefone;
    }

    /**
     * @inheritDoc
     */
    public function setTelefone(Telefone $telefone = null): void
    {
        if ($telefone !== null && $telefone->getTelefone() !== null && $telefone->getDdd() !== null) {
            $this->telefone = $telefone;
        } else {
            throw new InvalidArgumentException("Por favor, informe um telefone válido como 999999999");
        }
    }
}
