<?php

namespace App\Contato;

use InvalidArgumentException;

/**
 * Class Email
 * @package App\Contato
 */
interface EmailInterface
{
    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $email
     * @return void
     * @throws InvalidArgumentException
     */
    public function setEmail(string $email): void;
}
