<?php

require_once __DIR__ . '/../Models/Usuario.php';
// DAO Usuario - responsável por interagir com o banco de dados para operações relacionadas a usuários
class UsuarioDAO {
    // Atributo para armazenar a conexão PDO
    private $pdo;

    // Construtor para receber a conexão PDO
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para buscar um usuário por email, utilizado para autenticação
    public function buscarPorEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $d = $stmt->fetch();

        if (!$d) return null;
        return new Usuario($d['id'], $d['email'], $d['senha']);
    }

    // Método para salvar um novo usuário no banco de dados
    public function salvar(Usuario $usuario) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        return $stmt->execute([$usuario->email, $usuario->senha]);
    }
}