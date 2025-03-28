<?php

use App\Core\Request;

require_once 'vendor/autoload.php';

$_ENV = array_merge($_ENV, parse_ini_file(".env"));

const NAMESPACE_BASE_CONTROLLERS = '\\App\\Controllers\\';

$controllerModules = scandir(__DIR__ . '/App/src/Controllers/');

foreach($controllerModules as $idx => $controllerModule){
    if(in_array($controllerModule,['.', '..'])){
        continue;
    }

    $controllerFileName = $controllerModule.'Controller.php';
    $filePath = __DIR__ . "/App/src/Controllers/" . "$controllerModule" . "/" . "$controllerFileName";

    if(is_dir($filePath)) {
        continue;
    }

    require_once $filePath;

    $controllerClass = pathinfo($controllerFileName, PATHINFO_FILENAME);
    $FQNController = NAMESPACE_BASE_CONTROLLERS . $controllerClass;

    $controller = new $FQNController();

    $request = Request::getInstance();
    $method = $request->action();

    if(!method_exists($controller, $method)) {
        http_response_code(404);
        die('Method not found');
    }
    
    call_user_func_array([$controller, $method], [$request]);
}