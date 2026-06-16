# 📅 Sistema de Agenda de Contatos — PHP

Aplicação web dinâmica para gerenciamento pessoal de contatos com controle de acesso rigoroso, desenvolvida como projeto prático para a disciplina de Desenvolvimento de Sistemas Web na **UESB (Universidade Estadual do Sudoeste da Bahia)**.

## 🏛️ Arquitetura e Tecnologias

- **Linguagem:** PHP 8+
- **Banco de Dados:** MySQL
- **Driver de Conexão:** PDO (PHP Data Objects)
- **Padrão de Arquitetura:** MVC (Model-View-Controller) trabalhando em conjunto com o padrão **DAO (Data Access Object)**.

## 🔒 Diferenciais Técnicos e Segurança

- **Isolamento Multiusuário:** Segurança a nível de registro por meio da cláusula `WHERE usuario_id = :id`. Um usuário autenticado é incapaz de visualizar, editar ou remover contatos de terceiros.
- **Segurança Crítica:** Criptografia de senhas usando o algoritmo hash `bcrypt` (`password_hash`).
- **Blindagem contra Ataques:** Proteção ativa contra SQL Injection (Prepared Statements do PDO) e XSS (`htmlspecialchars`).
- **Acessibilidade Semântica:** Implementação de marcações estruturais HTML5 e propriedades WAI-ARIA.

## 🚀 Como Executar

1. Importe o script SQL contido no manual de instalação no seu SGBD (Ex: MySQL Workbench).
2. Configure suas credenciais locais no arquivo `app/db.php`.
3. Inicie o servidor embutido do PHP na raiz do projeto: `php -S localhost:8000 -t public`.
4. Acesse: `http://localhost:8000/`.

---

**Desenvolvedor:** Camilla Novaes Mendes
