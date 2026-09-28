<?php

$conexao = mysqli_connect(
    "localhost",
    "root",
    "root",
    "biblioteca",

);

if (!$conexao){
   die("erro de conexão: " . mysqli_connect_error());
}