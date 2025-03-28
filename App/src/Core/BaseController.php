<?php

namespace App\Core;

class BaseController
{
    protected function render($view, $data = []): void
    {
        $moduleName = ucfirst($view);
        extract($data);
        require_once __DIR__ . "/../../../App/src/View/$moduleName/$view.php";
    }
}