<?php

namespace App\ValueObjects;

use App\Enums\Regex;
use Exception;

readonly class Password
{
    public string $password;

    public function __construct(string $password)
    {
        $this->validate($password);
        $this->encrypt($password);
        $this->password = $password;
        return $this->password;
    }

    private function validate(string $password)
    {
        $this->validatePasswordLenght($password);
        $this->validatePasswordPower($password);
    }

    private function validatePasswordLenght(string $password)
    {
        if(strlen($password) < 6){
            throw new Exception('The min password length is 6 characters');
        }
    }

    private function validatePasswordPower(string $password)
    {
        # logica para verificar os caracteres da senha e fazer a pontuacao de forca dela
    }

    public function encrypt($password)
    {
        # logica para encriptar a senha
    }
}