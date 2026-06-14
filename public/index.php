<?php

require_once '../app/Controllers/ContatoController.php';

// Dispara o cérebro da nossa listagem
$controller = new ContatoController();
$controller->index();