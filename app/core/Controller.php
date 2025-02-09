<?php

namespace App\core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        
        $viewPath = __DIR__ . '/../../app/Views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            throw new \Exception("View file not found: $view");
        }
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
}