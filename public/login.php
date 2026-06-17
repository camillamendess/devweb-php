<?php

// Ponto de entrada público para a autenticação do usuário, instancia o AuthController e chama o método responsável por validar as credenciais
require_once '../app/Controllers/AuthController.php';

$controller = new AuthController();
$controller->login();