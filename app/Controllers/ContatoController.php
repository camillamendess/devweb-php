
<?php
// O Controller é o intermediário, o cérebro. Ele pede os dados para o Model e decide qual View vai exibir esses dados para o usuário.

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../Models/Contato.php';

class ContatoController {
    
    public function index() {
        global $pdo; // Puxa a variável $pdo lá do seu db.php

        // 1. Instancia o Model e busca os dados
        $contatoModel = new Contato($pdo);
        $contatos = $contatoModel->listarTodos();

        // 2. Carrega a View enviando a variável $contatos para ela
        require_once __DIR__ . '/../Views/listar_contatos.php';
    }

    // 🌟Cuida da exibição e do envio do formulário
    public function criar() {
        global $pdo;

        // Se o método for POST, significa que o usuário clicou em "Salvar"
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contatoModel = new Contato($pdo);
            
            // Manda o Model salvar os dados vindos do formulário
            $contatoModel->salvar($_POST['nome'], $_POST['telefone'], $_POST['email']);

            // Redireciona de volta para a listagem
            header("Location: index.php");
            exit;
        }

        // Se for uma requisição comum (GET), apenas exibe a View do formulário
        require_once __DIR__ . '/../Views/formulario_contato.php';
    }

    // Gerencia a edição do contato
    public function editar() {
        global $pdo;

        // Pega o ID vindo da URL (?id=X)
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php");
            exit;
        }

        $contatoModel = new Contato($pdo);

        // Se o formulário foi enviado via POST, atualiza os dados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contatoModel->atualizar($id, $_POST['nome'], $_POST['telefone'], $_POST['email']);
            header("Location: index.php");
            exit;
        }

        // Se for um acesso normal (GET), busca os dados atuais para exibir na View
        $contato = $contatoModel->buscarPorId($id);
        
        if (!$contato) {
            header("Location: index.php");
            exit;
        }

        require_once __DIR__ . '/../Views/editar_contato.php';
    }

    //  Gerencia a exclusão do contato
    public function deletar() {
        global $pdo;

        $id = $_GET['id'] ?? null;
        if ($id) {
            $contatoModel = new Contato($pdo);
            $contatoModel->deletar($id);
        }

        header("Location: index.php");
        exit;
    }
}