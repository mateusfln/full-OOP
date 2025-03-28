<?php

namespace App\Views\Helpers;

class HtmlHelper
{
    public static function alert(string $content): string
    {
        return "<div class='alert alert-danger' role='alert'>
                    <strong>$content</strong>
                </div>";
    }
}