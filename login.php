<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>biblioteca</h1>
        <p class="subtitulo">faça login para acessar o sistema.</p>

        <?php
        if (isset($_GET['erro']) && $_GET['erro'] === 'login'){
            echo '<div class="mensagem erro">login inválido. verifique o email e senha.</div>';
        }
        ?>
        <form action="autenticar.php" method="POST">
            <div class="form group">
<label for="email">email</label>
<input type="email" id="email" name="email" placeholder="digite seu email" required>
            </div>
            <div class="form-group">
<label for="senha">senha</label>
<input type="password" id="senha" name="senha" placeholder="digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-block">entrar
            </button>
        </form>
        <div class="nav-links">
            <p>não tem conta? <a href="cadastro.php">cadastra-se</a></p>
        </div>
        <a href="cadastro.php" class="btn btn-voltar">voltar para cadastro</a>
        <div class="dica-navegacao">
<strong>fluxo</strong> login → painel → cadastrar ou listar 
        </div>
    </div>
</body>
</html>