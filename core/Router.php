<?php

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function dispatch(string $uri): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            [$controller, $action] = $this->routes[$method][$path];

            $controllerInstance = new $controller();

            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
                return;
            }
        }

        http_response_code(404);
        echo '404 - Page not found';
    }
}