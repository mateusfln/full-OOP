<?php

namespace App\Enums;

enum Regex: string
{
    case USERNAME = '^[a-zA-Z0-9]{3,20}$';
}