<?php

// protege a página: só usuários logados podem cadastrar livros
include("verificar_sessao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar livro - biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>cadastrar livro</h1>
        <p class="subtitulo">preencha os dados do livro.</p>

        <!-- formulario envia os dados para salvar_livro.php -->
        <form action="salvar_livro.php" method="POST">
            <div class="form-group">
                <label for="titulo">titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="digite o titulo do livro" required>
            </div>
            <div class="form-group">
                <label for="autor">autor</label>
                <input type="text" id="autor" name="autor" placeholder="digite o titulo do livro" required>
            </div>
            <div class="form-group">
                <label for="status">status</label>
                <!-- select permite escolher entre opções pré-definidas -->
                <select name="status" id="status" required>
                    <option value="Disponivel">Disponivel</option>
                    <option value="Emprestado">Emprestado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-block btn-sucesso">
                Salvar Livro
            </button>

        </form>

        <!-- botão de voltar para o painel principal -->
        <a href="painel.php" class="btn btn-voltar">
            voltar para o painel.
        </a>

    </div>
</body>

</html>