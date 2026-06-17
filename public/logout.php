<?php

// Ponto de entrada público para o encerramento da sessão do usuário, instancia o AuthController e chama o método responsável por destruir a sessão e redirecionar para o login
require_once '../app/Controllers/AuthController.php';

$controller = new AuthController();
$controller->logout();