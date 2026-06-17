<?php

// Ponto de entrada público para a exclusão de um contato, instancia o ContatoController e chama o método responsável por deletar
require_once '../app/Controllers/ContatoController.php';

$controller = new ContatoController();
$controller->deletar();