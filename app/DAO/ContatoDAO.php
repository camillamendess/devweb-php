<?php

require_once __DIR__ . '/../Models/Contato.php';

class ContatoDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Busca no banco e transforma as linhas em Objetos do tipo Contato
    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM contatos ORDER BY nome");
        $dados = $stmt->fetchAll();

        $contatos = [];
        foreach ($dados as $d) {
            $contatos[] = new Contato($d['id'], $d['nome'], $d['telefone'], $d['email']);
        }
        return $contatos;
    }

    public function salvar(Contato $contato) {
        $stmt = $this->pdo->prepare("INSERT INTO contatos (nome, telefone, email) VALUES (?, ?, ?)");
        return $stmt->execute([$contato->nome, $contato->telefone, $contato->email]);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contatos WHERE id = ?");
        $stmt->execute([$id]);
        $d = $stmt->fetch();

        if (!$d) return null;
        return new Contato($d['id'], $d['nome'], $d['telefone'], $d['email']);
    }

    public function atualizar(Contato $contato) {
        $stmt = $this->pdo->prepare("
            UPDATE contatos
            SET nome = ?, telefone = ?, email = ?
            WHERE id = ?
        ");
        return $stmt->execute([$contato->nome, $contato->telefone, $contato->email, $contato->id]);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM contatos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}