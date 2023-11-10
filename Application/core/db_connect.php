<?php
// Dados de conexão com o banco de dados
$host = "localhost"; 
$usuario = "root";
$senha = "";
$banco_de_dados = "users";

// Conexão com o banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco_de_dados);

// Verifica a conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

?>
