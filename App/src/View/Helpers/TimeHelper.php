<?php

namespace App\Views\Helpers;

use DateTime;
use DateTimeZone;

class TimeHelper
{
    public static function getDateFromFormat(string $date, string $format): string
    {
        return (new DateTime($date, new DateTimeZone('America/Sao_Paulo')))->format($format);
    }
}