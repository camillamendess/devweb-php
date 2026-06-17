<?php

// Ponto de entrada público para a listagem de contatos do usuário logado, instancia o ContatoController e chama o método responsável por exibir a agenda
require_once '../app/Controllers/ContatoController.php';

$controller = new ContatoController();
$controller->index();