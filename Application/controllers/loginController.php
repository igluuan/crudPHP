<?php
session_start();
include_once 'C:\\xampp\\htdocs\\login-php\\Application\\core\\db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar as credenciais do usuário no banco de dados
    $sql = "SELECT * FROM credenciais WHERE user = '$username' AND senha = '$password'";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Login bem-sucedido, inicie a sessão e redirecione para a página inicial
            $_SESSION['user'] = $username;
            mysqli_close($conexao); // Feche a conexão após a consulta bem-sucedida
            header("Location: Application\views\home\painel.php");
            exit();
        } else {
            // Login falhou, redirecione de volta para o formulário de login
            mysqli_close($conexao); // Feche a conexão em caso de falha
            header("Location: teste.php");
            exit();
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conexao);
    }
}
?>
