<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container">
    <h1 style="text-align: center;">Agenda de Contatos</h1>
    <a href="logout.php" style="color: red; float: right;">Sair do Sistema</a>
    <a href="criar.php" class="botao-destaque link-externo">Novo Contato</a>

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