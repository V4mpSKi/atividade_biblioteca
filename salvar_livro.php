<?php
// salvar_usuario.php
// recebe os dados do formulario de cadastro e salva o usuario
// no banco.

// conceitos: POST, password_hash, MYSQL, INSERT, verificação
// de e-mail duplicado

// inclui o arquivo de conexão com o banco de dados.
include("conexao.php");

// recebe os dados enviados pelo formulario via metodo POST.
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// ====================================================
// VERIFICAÇÃO DE EMAIL DUPLICADO
// antes de cadastrar, verifica se o email já existe mo banco
// ====================================================

// monta a consulta SQL (SELECT) para buscar o email
$sqlVerificar = "SELECT id FROM usuarios where email = '$email'";

// execulta a consulta no MySQL
resultadoVerificar = mysqli_query($conexao, $sqlVerificar);

// validação: mysql_num_rows() conta quantos registros
// foram encontrados.
if (mysqli_num_rows($resultadoVerificar) > 0) {
    // se o email já existe, redireciona d evolta ao cadastro
    // com mensagem de erro
    header ("location: cadastro.php?erro=email");
    exit();
}

// ===================================================
// CRIPITOGRAFIA DA SENHA
// nunca armazenamos a senha em texto puro no banco
// ===================================================
// password_hash() gera um hash seguro da senha
// PASSWORD_DEFAULT usa um algoritimo bcrypt(padrão PHP)
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// ===================================================
// INSERÇÃO NO BANCO (CREAT DO CRUD)
// ===================================================

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES
('$nome', '$email', '$senhaCriptografada')";

// Executa o INSERT no banco de dados
mysqli_query($conexao, $sql);


// redireciona o usuario para apagina de login após um cadastro
// bem-sucedido.
header("location: login.php");
exit();