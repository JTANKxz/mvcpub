<?php

namespace App\core;

class Router
{
    protected $routes = [];
    protected $currentGroup = [];

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    public function group($attributes, $callback)
    {
        $this->currentGroup = $attributes;
        $callback($this);
        $this->currentGroup = [];
    }

    protected function addRoute($method, $uri, $action)
    {
        $route = [
            'method' => $method,
            'uri' => $this->applyGroupPrefix($uri),
            'action' => $this->parseAction($action),
            'middleware' => $this->currentGroup['middleware'] ?? null
        ];

        $this->routes[] = $route;
    }

    protected function applyGroupPrefix($uri)
    {
        $prefix = $this->currentGroup['prefix'] ?? '';
        return $prefix . $uri;
    }

    protected function parseAction($action)
    {
        if (is_string($action)) {
            return ['controller' => $action, 'method' => 'index'];
        }

        if (is_array($action)) {
            return ['controller' => $action[0], 'method' => $action[1]];
        }

        return $action;
    }

    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
                // Apply middleware
                if ($route['middleware']) {
                    $middleware = new $route['middleware']();
                    $middleware->handle();
                }

                // Handle controller action
                $controller = $route['action']['controller'];
                $method = $route['action']['method'];

                $controllerInstance = new $controller();
                return $controllerInstance->$method();
            }
        }

        http_response_code(404);
        echo '404 - Page not found';
    }
}