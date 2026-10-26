<?php

// atualizar_.php
// Recebe os dados do formulario de edição e atualiza o livro
// Conceitos: POST, MySQL, UPDATE (U NO CRUD)

// protege a página: só usuário logados podem atualizar livros
include("verificar_sessao.php");

// inclui conexão com o banco de dados
include("conexao.php");

// recebe os dados enviados pelo formulário de edição.
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$status = $_POST['status'];

// Monta o comando SQL UPDATE para alterar os dados do livro
$sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor',
$status = '$status' WHERE id = $id";

// Executa o UPDATE mo banco de dados
mysqli_query($conexao, $sql);

// redireciona para a listagem após atualizar
header("Location: listar_livro.php");
exit();