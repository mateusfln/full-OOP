<?php

namespace App\Views\Helpers;

class FileHelper
{
    public static function importFile(string $path)
    {
        return require_once($path);

    }

    public static function importSvg(string $path)
    {
        $path = trim($path);
        return file_get_contents(__DIR__.'/../../../public/svg/' . $path . '.svg');
    }
}