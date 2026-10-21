<?php


// salvar_livro.php
// recebe os dados do formulario e insere um novo livro no banco
// conceitos: POST, MySQL, INSERT (CREATE DO CRUD)

// protege a página: só usuarios logados podem salvar livros.
include("verificar_sessao.php");

// include a conexão com o banco de dados (MySQL)
include("conexao.php");

// recebe os dados enviados pelo formulario via POST
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$status = $_POST['status'];

// monta o comando SQL INSERT para cadastrar o livro:
$sql = "INSERT INTO livros (titulo, autor, status) VALUES ('$titulo', '$autor', '$status')";

// executa o INSERT no banco de dados
mysqli_query($conexao, $sql);

// redireciona para listagem de livros após salvar
header("Location: listar_livro.php");
exit();