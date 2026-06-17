<?php

require_once __DIR__ . '/../Models/Contato.php';
// DAO Contato - responsável por interagir com o banco de dados para operações relacionadas a contatos
class ContatoDAO {
    // Atributo para armazenar a conexão PDO
    private $pdo;

    // Construtor para receber a conexão PDO
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para listar todos os contatos de um usuário específico, ordenados por nome
    public function listarTodos($usuario_id) {
        $sql = "SELECT * FROM contatos WHERE usuario_id = :usuario_id ORDER BY nome ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para salvar um novo contato no banco de dados
    public function salvar(Contato $contato) {
        $stmt = $this->pdo->prepare("INSERT INTO contatos (nome, telefone, email, usuario_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$contato->nome, $contato->telefone, $contato->email, $contato->usuario_id]);
    }

    // Método para buscar um contato por ID, garantindo que ele pertence ao usuário
    public function buscarPorId($id, $usuario_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contatos WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $usuario_id]);
        $d = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$d) return null;
        return new Contato($d['id'], $d['nome'], $d['telefone'], $d['email'], $d['usuario_id']);
    }

    // Método para atualizar um contato existente, garantindo que ele pertence ao usuário
    public function atualizar(Contato $contato) {
        $stmt = $this->pdo->prepare("
            UPDATE contatos
            SET nome = ?, telefone = ?, email = ?
            WHERE id = ? AND usuario_id = ?
        ");
        return $stmt->execute([$contato->nome, $contato->telefone, $contato->email, $contato->id, $contato->usuario_id]);
    }

    // Método para deletar um contato, garantindo que ele pertence ao usuário
    public function deletar($id, $usuario_id) {
        $stmt = $this->pdo->prepare("DELETE FROM contatos WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$id, $usuario_id]);
    }
}