<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos - Editar</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<!-- View Editar Contato - exibe o formulário de edição de um contato existente, com os dados pré-preenchidos pelo ContatoController -->
<div class="container">

    <h1>Editar Contato</h1>

    <!-- Formulário de edição: envia os dados atualizados via POST para o ContatoController processar -->
    <form method="POST">
        <!-- Campo de nome: pré-preenchido com o valor atual do contato -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" aria-required="true" value="<?= htmlspecialchars($contato->nome ?? '') ?>" required>
        
        <!-- Campo de telefone: valida o formato (XX)9XXXX-XXXX via atributo pattern -->
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" aria-required="true" value="<?= htmlspecialchars($contato->telefone ?? '') ?>" placeholder="(XX)9XXXX-XXXX" pattern="\(\d{2}\)\d{5}-\d{4}" required>
        
        <!-- Campo de e-mail: pré-preenchido com o valor atual e validado como formato de e-mail -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" aria-required="true" value="<?= htmlspecialchars($contato->email ?? '') ?>" required>
        
        <button class="botao-destaque link-externo" type="submit">Atualizar</button>
    </form>

    <!-- Link de retorno para a listagem de contatos sem salvar alterações -->
    <a href="index.php" class="botao-destaque link-externo">Voltar</a>

</div>
</body>
</html>