<?php

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../DAO/ContatoDAO.php';
require_once __DIR__ . '/../Models/Contato.php';
// Controller Contato - responsável por lidar com as requisições relacionadas a contatos, interagindo com o ContatoDAO e as views correspondentes
class ContatoController {
    // Atributo para armazenar o ID do usuário logado, garantindo que as operações sejam feitas apenas nos contatos pertencentes a ele
    private $idLogado;

    // Construtor para verificar se o usuário está logado e armazenar seu ID, redirecionando para a página de login caso contrário
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
    
    // Função para listar todos os contatos do usuário logado
    public function index() {
        global $pdo;
        $contatoDAO = new ContatoDAO($pdo);
        $contatos = $contatoDAO->listarTodos($this->idLogado); 
        require_once __DIR__ . '/../Views/listar_contatos.php';
    }

    // Função para cadastra um novo contato na agenda do usuário logado
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

    // Função que edita um contato da agenda do usuario logado
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

    // Funcão que deleta um contato da agenda do usuario logado
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