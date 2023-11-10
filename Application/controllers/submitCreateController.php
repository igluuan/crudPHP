<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $username = $_POST['username'];
    $email = $_POST['email']; // Correção: Defina a variável $email corretamente
    $password = $_POST['password'];

    $sql = "INSERT INTO credenciais (user, email, senha) VALUES ('$username', '$email', '$password')";
    // Executando a query
    if (mysqli_query($conexao, $sql)) {
        echo "Dados inseridos com sucesso!";
        header('Location: index.php'); // Correção: Remova o espaço em branco após 'Location'
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conexao);
    }

    // Fechando a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
