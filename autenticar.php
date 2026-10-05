<?php
// autenticar.php verificar se o eail e senha informados estão corretos!
// conceito deles são: session start, SELECT no MySQL, password_verify!

// aqui inicia a sessão do usuario.
// a sessão permite guardar os dados do usuario logado entre as paginas!

// inclui a conexão com o banco de dados.
include("conexao.php");

// recebe e a senha digitados no formulario de login
$email = $_POST['email'];
$senha = $_POST['senha'];

// ===================================================================
// CONSULTA NO BANCO (READ do CRUD)
// busca o usuarioa pelo email informado
// ===================================================================

// montando e consulta SQL SELECT
$sql = "SELECT * FROM usuarios WHERE email = 'email'";

// Executa a consulta e guarda o resultado.
$resultado = mysqli_query($conexao, $sql);

// mysqli_fetch_assoc() transforma a linha do resultado 
// em array associativo
$usuario = mysqli_fetch_assoc($resultado);

// ===================================================================
// VERIFICAÇÃO DA SENHA
// ===================================================================

// verificar se o usuario foi encontrado e se a senha está correta
// password_verify() compara a senha digitada com o hash salvo
// no banco
if ($usuario && password_verify($senha, $usuario['senha'])) {
    //login bem-sucedido: guarda o nome do usuario na sessão
    $_SESSION['nome'] = $usuario['nome'];
    // redireciona para o painel principal
    header("location: painel.php");
    exit();
} else {
    // login inválido: redireciona de volta para login
    // com mensagem de erro
    header("location: login.php?erro=login");
    exit();
}
