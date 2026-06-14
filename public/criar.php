<?php

require_once '../app/Controllers/ContatoController.php';

// Dispara o cérebro da criação de contatos
$controller = new ContatoController();
$controller->criar();