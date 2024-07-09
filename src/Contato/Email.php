<?php

namespace App\Contato;

use InvalidArgumentException;

/**
 * Class Email
 * @package App\Contato
 */
class Email implements EmailInterface
{
    /** @var string */
    private string $email;

    /**
     * @inheritDoc
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function setEmail(string $email): void
    {
        if (self::validateEmail($email)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("Por favor, informe um e-mail válido como exemplo@email.com");
        }
    }

    /**
     * @param string $email
     * @return boolean
     */
    private function validateEmail(string $email): bool
    {
        $regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(\+[a-zA-Z0-9._%+-]+)?$/";
        //return (bool) preg_match($regex, $email);
        return preg_match($regex, $email) === 1;
    }
}
