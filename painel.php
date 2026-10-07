<?php

// inclui a verificação de sessão (protege a página de acesso não autorizado)
inclucde(verificar_sessao . php);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>painel - biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- exibe o nome do usuário logado (vem da sessão $_SESSION) -->
        <h1>Olá, <?php echo $_SESSION['nome']; ?></h1>
        <p class="subtitulo">Bem vindo ao painel da biblioteca. Escolha uma opção: </p>
        <!-- cards grandes para facilitar a navegação -->
        <div class="painel-cards">
            <a href="cadastrar_livro.php" class="card-link">
                cadastrar livro
            </a>
            <a href="listar_livro.php" class="card-link">
                listar livros
            </a>
            <a href="logout.php" class="card-link">
                sair
            </a>
        </div>
        <div class="dica-navegação">
            <strong>fluxo:</strong>
            painel → cadastrar livro ou listar → editar / excluir
        </div>
    </div>
</body>

</html>