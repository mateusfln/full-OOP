<?php

namespace App\Types;

class UserName
{
    public function __construct(string $username)
    {
        $this->validate($username);
    }

    private function validate(string $username)
    {
        return $this->validateNameLenght($username) && $this->validateEspecialCharacters($username);

    }
}