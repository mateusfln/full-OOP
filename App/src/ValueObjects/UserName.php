<?php

namespace App\ValueObjects;

use App\Enums\Regex;
use Exception;

readonly class UserName
{
    public string $username;

    public function __construct(string $username)
    {
        $this->validate($username);
        
        $this->$username = $username;

        return $this->$username;
    }

    private function validate(string $username)
    {
        $this->validateUserNameLenght($username);
        $this->validateSpecialCharacters($username);
    }

    private function validateUserNameLenght(string $username)
    {
        if(strlen($username) > 20){
            throw new Exception('The max length to username is 20 characters');
        }
    }

    private function validateSpecialCharacters(string $username)
    {
        if(preg_match((string)Regex::USERNAME, $username)){
            throw new Exception('The length to username is 3-20 and dont accept special characters');
        }
    }
}