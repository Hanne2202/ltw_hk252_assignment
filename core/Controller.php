<?php

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = BASE_PATH . '/app/views/' . $view . '.php';

        if (file_exists($viewPath)) {
            require_once $viewPath;
            return;
        }

        echo 'View not found: ' . $view;
    }
}