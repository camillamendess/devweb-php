<?php
// O Model cuida estritamente dos dados e das consultas ao banco de dados. Ele não sabe nada de HTML e nem como a requisição chegou.

class Contato {
    private $pdo;

    // Recebemos a conexão PDO criada no db.php
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Busca todos os contatos ordenados por nome
    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM contatos ORDER BY nome");
        return $stmt->fetchAll();
    }

    // Insere o contato no banco de dados
    public function salvar($nome, $telefone, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO contatos (nome, telefone, email) VALUES (?, ?, ?)");
        return $stmt->execute([$nome, $telefone, $email]);
    }

    // Busca um único contato pelo ID para preencher o formulário
    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contatos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Atualiza os dados do contato
    public function atualizar($id, $nome, $telefone, $email) {
        $stmt = $this->pdo->prepare("
            UPDATE contatos
            SET nome = ?, telefone = ?, email = ?
            WHERE id = ?
        ");
        return $stmt->execute([$nome, $telefone, $email, $id]);
    }

    // Deleta o contato do banco
    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM contatos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}