<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos - Novo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container">

    <h1>Novo Contato</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" aria-required="true" required>
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" aria-required="true" placeholder="(XX)9XXXX-XXXX" pattern="\(\d{2}\)\d{5}-\d{4}" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" aria-required="true" required>
        <button class="botao-destaque link-externo" type="submit">Salvar</button>
    </form>

    <a href="index.php" class="botao-destaque link-externo">Voltar</a>

</div>
</body>
</html>