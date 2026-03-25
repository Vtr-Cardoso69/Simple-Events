<?php
                                        // PEGA O CONTROLLER E ACTION QUE É ENVIADO ATRAVÉS DA URL E USA DIRETO NO __DIR__ PARA TUDO SER CARREGADO NO INDEX.PHP //
$controllerName = isset($_GET['controller']) ? ucfirst(strtolower($_GET['controller'])) . 'Controller' : 'EventoController';
$action = $_GET['action'] ?? 'index';

// OBVIAMENTE UMA VARIAVEL QUE CORRESPONDE A TUDO OQUE VEIO DA URL //
$controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

// APENAS MENSGAEM DE ERRO //
if (!file_exists($controllerFile)) {
    http_response_code(404);
    echo "Controller não encontrado: $controllerName";
    exit;
}

// RESPONSAVEL POR CARREGAR/IMPRIMIR //
require_once $controllerFile;

// APENAS MENSGAEM DE ERRO //
if (!class_exists($controllerName)) {
    http_response_code(404);
    echo "Controller não encontrado: $controllerName";
    exit;
}

// RESPONSAVEL POR CARREGAR/IMPRIMIR //
$controller = new $controllerName();

// APENAS MENSGAEM DE ERRO //
if (!method_exists($controller, $action)) {
    http_response_code(404);
    echo "Ação não encontrada: $action";
    exit;
}

// RESPONSAVEL POR CARREGAR/IMPRIMIR //
$controller->{$action}();
