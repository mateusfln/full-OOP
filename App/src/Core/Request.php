<?php

namespace App\Core;

use App\Traits\Singleton;

class Request
{
    use Singleton;
   
    protected array $get;
    protected array $post;
    protected array $files;
    protected array $server;

    private function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
        $this->server = $_SERVER;
    }

    /**
     * @param string|null $key
     * @param string|null $default
     * @return array|mixed|string|null
     */
    public function get(string $key, string $default)
    {
        if ($key === null) {
            return $this->get;
        }

        return $this->get[$key] ?? $default;
    }

    public function post(?string $key, ?string $default)
    {
        if ($key === null) {
            return $this->post;
        }

        return $this->post[$key] ?? $default;
    }

    public function method()
    {
        return $this->server['REQUEST_METHOD'] ?? 'GET';
    }

    public function uri()
    {
        return $this->server['REQUEST_URI'] ?? '/';
    }

    public function action()
    {
        $uri = $this->server('REQUEST_URI');
        $pathInfo = pathinfo($uri, PATHINFO_FILENAME);

        [$action] = explode('?', $pathInfo);
        $action = explode('-', $action);
        
        array_map(
            function ($a) {
                return ucfirst($a);
            }, $action
        );

        return lcfirst(implode('',$action));
    }

    public function server($key = null, $default = null)
    {
        if ($key === null) {
            return $this->server;
        }

        return $this->server[$key] ?? $default;
    }
}