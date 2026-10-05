<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro do usuario - biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>cadastro de usuario</h1>
        <p class="subtitulo">crie sua conta para acessar o sistema da biblioteca.</p>
        <?php
        if (isset($_GET['erro']) && $_GET['erro'] === 'email') {
            echo '<div class="mensagem-erro">Este email já está cadastrado.</div>';
        }
        ?>

        <form action="salvar_usuario.php" method="POST">
            <div class="form-group">
                <label for="nome">nome</label>
                <input type="text" id="nome" name="nome" placeholder="digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" id="email" name="nome" placeholder="digite seu email" required>
            </div>
            <div class="form-group">
                <label for="senha">senha</label>
                <input type="password" id="senha" name="senha" placeholder="digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-block">cadastrar</button>
        </form>
        <div class="nav-links">
            <p>já tem conta? <a href="login.php">fazer login</a> </p>
        </div>
        <a href="login.php" class="btn btn-voltar">fazer login</a>
        <div class="dica-navegacao">
            <strong>fluxo:</strong> cadastro → login → painel → gerenciar livros
        </div>
    </div>

</body>

</html>