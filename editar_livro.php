<?php

// editar_livro.php
// exibe o formulario preenchimento com os dados do livro para edição
// conceitos: $_GET, MySQL, SELECT, formulario de edição.


// protege a página: so usuarios podem editar livros
include("verificar_sessao.php"); 

// inclui a conexão com o banco de dados.
include("conexao.php");

// recebe o ID do livro pela URL (ex: editar_livro.php?id=3)
$id = $_GET['id'];

// consulta SQL que busca o livro pelo ID.
$sql = "SELECT * FROM livros WHERE id = $id";

// executa a consulta
$resultado = mysqli_query($conexao, $sql);

// transforma o resultado em um array associativo
$livro = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar livro - biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
<h1>Editar Livro</h1>
<p class="subtitulo">
altere os dados do livro e clique em atualizar.
</p>
<!-- formulario envia os dados para atualizar_livro.php -->
 <form action="atualizar_livro.php" method="POST">
<!-- campo hidden guarda o ID sem guarda o ID sem aparecer na tela -->
 <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">

 <div class="form-group">
    <label for="titulo">titulo</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>">
 </div>
 <div class="form-group">
    <label for="autor" id="autor" name="autor" value="<?php echo $livro['autor']; ?>"></label>
 </div>
 <div class="form-group">
    
 </div>
 </form>
    </div>
    
</body>
</html>