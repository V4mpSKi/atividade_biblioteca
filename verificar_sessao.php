<?php

// verificar_sessao.php
// arquivo incluindo nas paginas resritas do sistema.
// garante que apenas usuário (ou retoma uma sessão já existente)

// inicia a sessão do usuario (ou retoma uma sessão já existente)
session_start();

// cabeçalhos HTTP que impedem o navegador de guardar a página
// em cache.
// isso evita que usuario  volte ao painel após fazer logout.

header("Cache-control: no-cache, no-store, must-revalidate");
header("pragma: no-cache");
header("Expires: 0");

// Verificar se a variavel de sessão 'nome' existe.
// se não existir, o usuario não está logado.

if(isset($_SESSION["nome"])) {
    // header() redireciona o navegador para outra pagina.
    header('Location: login.php');
    // exit( encerra o script para garantir que nada mais)
    // seja executado.
    exit();
}

