<?php

// Ponto de entrada público para a edição de um contato existente, instancia o ContatoController e chama o método responsável por atualizar
require_once '../app/Controllers/ContatoController.php';

$controller = new ContatoController();
$controller->editar();