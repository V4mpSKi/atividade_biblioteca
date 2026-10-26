<?php


 
// editar_livro.php é responsável por exibir o formulário de edição de um livro específico. Ele protege a página para que apenas usuários logados possam acessar, conecta-se ao banco de dados, busca os dados do livro pelo ID fornecido na URL e preenche o formulário com os dados existentes do livro. O usuário pode então alterar os dados e enviar o formulário para atualizar o registro no banco de dados.
// protege a página: só usuários logados podem listar livros.
include("verificar_sessao.php");
 
// inclui a conexão do banco de dados.
include("conexao.php");
 
// Recebe o ID do livro a ser editado.
$id = $_GET['id'];
 
// Consulta o livro no MySQL para obter os dados do livro com o ID fornecido.
$sql = "SELECT * FROM livros WHERE id = $id";
 
// Executa a consulta SQL.
$resultado = mysqli_query($conexao, $sql);
 
// Transforma o resultado da consulta em um array associativo.
$livro = mysqli_fetch_assoc($resultado);
 
?>
<!DOCTYPE html>
<html lang="pt-BR">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
 
    <div class="container">
        <h1>Editar Livro</h1>
        <p class="subtitulo">Altere os dados do livro abaixo:</p>
 
        <!-- Formulário de edição do livro -->
        <form action="atualizar_livro.php" method="post">
            <!-- Campo hidden guarda o ID do livro -->
            <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
            <!-- Campos para editar os dados do livro -->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?php echo $livro['autor']; ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Disponivel" <?php if ($livro['status'] === 'Disponivel') echo 'selected'; ?>>Disponível</option>
                    <option value="Emprestado" <?php if ($livro['status'] === 'Emprestado') echo 'selected'; ?>>Emprestado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-block">Atualizar Livro</button>
        </form>
        <!-- Botão de voltar para o painel principal -->
        <a href="painel.php" class="btn btn-voltar">Voltar para o Painel</a>
    </div>
 
</body>
 
</html>