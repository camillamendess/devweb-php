<?php

// Ponto de entrada público para a criação de um novo contato, instancia o ContatoController e chama o método responsável por salvar
require_once '../app/Controllers/ContatoController.php';

$controller = new ContatoController();
$controller->criar();