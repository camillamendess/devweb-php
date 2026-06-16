<?php

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../DAO/ContatoDAO.php';
require_once __DIR__ . '/../Models/Contato.php';

class ContatoController {

    private $idLogado;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: login.php");
            exit;
        }

        $this->idLogado = $_SESSION['usuario_id'];
    }
    
    public function index() {
        global $pdo;
        $contatoDAO = new ContatoDAO($pdo);
        $contatos = $contatoDAO->listarTodos($this->idLogado); 
        require_once __DIR__ . '/../Views/listar_contatos.php';
    }

    public function criar() {
        global $pdo;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $novoContato = new Contato(null, $_POST['nome'], $_POST['telefone'], $_POST['email'], $this->idLogado);
            
            $contatoDAO = new ContatoDAO($pdo);
            $contatoDAO->salvar($novoContato);

            header("Location: index.php");
            exit;
        }
        require_once __DIR__ . '/../Views/formulario_contato.php';
    }

    public function editar() {
        global $pdo;
        $id = $_GET['id'] ?? null;
        if (!$id) { header("Location: index.php"); exit; }

        $contatoDAO = new ContatoDAO($pdo);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contatoAtualizado = new Contato($id, $_POST['nome'], $_POST['telefone'], $_POST['email'], $this->idLogado);
            $contatoDAO->atualizar($contatoAtualizado);
            
            header("Location: index.php");
            exit;
        }

        $contato = $contatoDAO->buscarPorId($id, $this->idLogado);
        if (!$contato) { header("Location: index.php"); exit; }

        require_once __DIR__ . '/../Views/editar_contato.php';
    }

    public function deletar() {
        global $pdo;
        $id = $_GET['id'] ?? null;
        if ($id) {
            $contatoDAO = new ContatoDAO($pdo);
            $contatoDAO->deletar($id, $this->idLogado);
        }
        header("Location: index.php");
        exit;
    }
}