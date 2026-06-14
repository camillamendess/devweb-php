<?php

require_once __DIR__ . '/../Models/Usuario.php';

class UsuarioDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function buscarPorEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $d = $stmt->fetch();

        if (!$d) return null;
        return new Usuario($d['id'], $d['email'], $d['senha']);
    }

    public function salvar(Usuario $usuario) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        return $stmt->execute([$usuario->email, $usuario->senha]);
    }
}