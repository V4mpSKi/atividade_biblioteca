<?php

// listar_livro.php
// exibe todos os livros cadastrados em uma tabela.
// conceitos: MySQL, SELECT (READ DO CRUD), loop while.

// protege a página: só usuarios logados podem listar livros.
include("verificar_sessao.php");

// inclui a conexão do banco de dados.
include("conexao.php");

// consulta SQL que busca todos os livros da tabela.
$sql = "SELECT * FROM livros";

// Executa a consulta e guarda o resultado
$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- container mais largo para acomodar a tabela -->
    <div class="container container-largo">
        <h1>listagem de livros</h1>
        <p class="subtitulo">
            todos os livros cadastrados no sistema.
        </p>
        <!-- tabela estilizada com os dados dos livros -->
        <table class="tabela-livros">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php
            // loop while percorre cada linha retornada
            // pela consulta SQL
            while ($livro = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['status']; ?></td>
                    <td class="acoes">
                        <!-- link para editar o livro -->
                        <!-- envia o ID pela URL com ?id -->
                        <a href="editar_livro.php?id=<?php echo $livro['id']; ?>" class="link-editar"> Editar </a>
                        <!-- link para excluir com confirmação do JS-->
                        <a href="excluir_livro.php?id= <?php echo $livro['id']; ?>" class="link-excluir"
                            onclick="return confirm('tem certeza que deseja excluir o livro?')"> Excluir </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <!-- botão de voltar para painel principal -->
        <a href="painel.php" class="btn btn-voltar">voltar para o painel</a>
    </div>
</body>

</html>