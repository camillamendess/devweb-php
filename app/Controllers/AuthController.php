<?php

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../DAO/UsuarioDAO.php';

class AuthController {
    
    public function login() {
        global $pdo;
        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $usuarioDAO = new UsuarioDAO($pdo);
            $usuario = $usuarioDAO->buscarPorEmail($email);

            // Verifica se o usuário existe e se a senha bate com o hash criptografado
            if ($usuario && password_verify($senha, $usuario->senha)) {
                if (session_status() === PHP_SESSION_NONE) session_start();
                
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['usuario_email'] = $usuario->email;

                header("Location: index.php");
                exit;
            } else {
                $erro = "E-mail ou senha inválidos!";
            }
        }

        require_once __DIR__ . '/../Views/login.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    //  Trata a exibição e o envio do registro de novos utilizadores
    public function cadastrar() {
        global $pdo;
        $erro = null;
        $sucesso = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $confirmar_senha = $_POST['confirmar_senha'] ?? '';

            $usuarioDAO = new UsuarioDAO($pdo);

            // Validações básicas de segurança na lógica do Controller
            if ($senha !== $confirmar_senha) {
                $erro = "As senhas não coincidem!";
            } elseif (strlen($senha) < 6) {
                $erro = "A senha deve ter pelo menos 6 caracteres!";
            } elseif ($usuarioDAO->buscarPorEmail($email) !== null) {
                $erro = "Este e-mail já está registrado!";
            } else {
                // SEgurança: Gera o hash criptografado perfeito (bcrypt)
                $senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);

                $novoUsuario = new Usuario(null, $email, $senha_criptografada);
                $usuarioDAO->salvar($novoUsuario);

                $sucesso = "Usuário registrado com sucesso! Já pode fazer login.";
            }
        }

        require_once __DIR__ . '/../Views/cadastro.php';
    }
}