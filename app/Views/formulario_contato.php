<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos - Novo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<!-- View Formulário Contato - exibe o formulário de criação de um novo contato, com os dados enviados via POST para o ContatoController -->
<div class="container">

    <h1>Novo Contato</h1>

    <!-- Formulário de criação: envia os dados do novo contato via POST para o ContatoController salvar na agenda -->
    <form method="POST">
        <!-- Campo de nome: identifica o contato na agenda -->
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" aria-required="true" required>
        <!-- Campo de telefone: valida o formato (XX)9XXXX-XXXX via atributo pattern -->
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" aria-required="true" placeholder="(XX)9XXXX-XXXX" pattern="\(\d{2}\)\d{5}-\d{4}" required>
        <!-- Campo de e-mail: validado nativamente pelo navegador como formato de e-mail -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" aria-required="true" required>
        <button class="botao-destaque link-externo" type="submit">Salvar</button>
    </form>

    <!-- Link de retorno para a listagem de contatos sem salvar o novo contato -->
    <a href="index.php" class="botao-destaque link-externo">Voltar</a>

</div>
</body>
</html>