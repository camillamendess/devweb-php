<?php

// Ponto de entrada público para o cadastro de novos usuários, instancia o AuthController e chama o método responsável pelo registro
require_once '../app/Controllers/AuthController.php';

$controller = new AuthController();
$controller->cadastrar();