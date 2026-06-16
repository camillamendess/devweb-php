<?php

require_once __DIR__ . '/../Models/Contato.php';

class ContatoDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarTodos($usuario_id) {
        $sql = "SELECT * FROM contatos WHERE usuario_id = :usuario_id ORDER BY nome ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function salvar(Contato $contato) {
        $stmt = $this->pdo->prepare("INSERT INTO contatos (nome, telefone, email, usuario_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$contato->nome, $contato->telefone, $contato->email, $contato->usuario_id]);
    }

    public function buscarPorId($id, $usuario_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contatos WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $usuario_id]);
        $d = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$d) return null;
        return new Contato($d['id'], $d['nome'], $d['telefone'], $d['email'], $d['usuario_id']);
    }

    public function atualizar(Contato $contato) {
        $stmt = $this->pdo->prepare("
            UPDATE contatos
            SET nome = ?, telefone = ?, email = ?
            WHERE id = ? AND usuario_id = ?
        ");
        return $stmt->execute([$contato->nome, $contato->telefone, $contato->email, $contato->id, $contato->usuario_id]);
    }

    public function deletar($id, $usuario_id) {
        $stmt = $this->pdo->prepare("DELETE FROM contatos WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$id, $usuario_id]);
    }
}