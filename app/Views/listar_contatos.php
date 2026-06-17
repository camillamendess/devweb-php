<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<!-- View Listar Contatos - exibe a listagem de todos os contatos do usuário logado, fornecida pelo ContatoController -->
<div class="container">
    <h1 style="text-align: center;">Agenda de Contatos</h1>
    <!-- Link de logout: encerra a sessão do usuário e redireciona para a página de login -->
    <a href="logout.php" style="color: red; float: right;">Sair do Sistema</a>
    <!-- Link para a view de criação de novo contato -->
    <a href="criar.php" class="botao-destaque link-externo">Novo Contato</a>

    <!-- Tabela de contatos: itera sobre a lista recebida do ContatoController e exibe cada contato em uma linha -->
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($contatos as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c->nome) ?></td>
                <td><?= htmlspecialchars($c->telefone) ?></td>
                <td><?= htmlspecialchars($c->email) ?></td>
                <!-- Ações disponíveis por contato: editar redireciona pelo ID, excluir exige confirmação do usuário antes de deletar -->
                <td>
                    <a href="editar.php?id=<?= $c->id ?>" class="botao-destaque link-externo">Editar</a>
                    <a href="deletar.php?id=<?= $c->id ?>" class="botao-destaque link-externo" onclick="return confirm('Deseja excluir este contato?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>