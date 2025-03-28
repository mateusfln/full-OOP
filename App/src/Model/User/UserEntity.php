<?php

namespace App\Model\User;

use App\ValueObjects\Password;
use App\ValueObjects\UserName;
use DateTime;

class UserEntity
{
    private UserName $username;

    private Password $password;
    
    private Email $email;

    private Cpf $cpf;

    private DateTime $dataNascimento;
}