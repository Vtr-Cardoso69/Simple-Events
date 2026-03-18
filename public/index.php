<?php

// Front controller simples para o MVC.
// Uso: /public/index.php?controller=evento&action=index

$controllerName = isset($_GET['controller']) ? ucfirst(strtolower($_GET['controller'])) . 'Controller' : 'EventoController';
$action = $_GET['action'] ?? 'index';

$controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
    http_response_code(404);
    echo "Controller não encontrado: $controllerName";
    exit;
}

require_once $controllerFile;

if (!class_exists($controllerName)) {
    http_response_code(404);
    echo "Controller não encontrado: $controllerName";
    exit;
}

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    http_response_code(404);
    echo "Ação não encontrada: $action";
    exit;
}

$controller->{$action}();
