<?php

namespace App\Model\User;

use App\Types\UserName;
use DateTime;

class UserEntity
{
    private UserName $username;

    private Password $password;
    
    private Email $email;

    private Cpf $cpf;

    private DateTime $dataNascimento;
}