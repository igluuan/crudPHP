<?php
include('C:\xampp\htdocs\login-php\Application\core\db_connect.php');
include('C:\xampp\htdocs\login-php\Application\models\userModel.php');

function checkLogin($username, $password) {
    global $conexao;

    try {
        $sql = "SELECT * FROM credenciais WHERE user = ? AND senha = ?";
        $stmt = mysqli_prepare($conexao, $sql);

        if (!$stmt) {
            throw new Exception("Falha na preparação da consulta: " . mysqli_error($conexao));
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Se o login for bem-sucedido, inicia uma sessão e redireciona para o painel
        if (mysqli_stmt_num_rows($stmt) > 0) {
            session_start();
            $_SESSION['user'] = $username;
            header('Location: ../views/home/painel.php'); // Caminho relativo
            exit();
        } else {
            // Adiciona mensagem de erro na URL e redireciona
            header('Location: ../views/user/login.php?error=Usuário ou senha incorretos!');
            exit();
        }
    } catch (Exception $e) {
        // Adiciona mensagem de erro na URL e redireciona
        header('Location: ../views/user/login.php?error='.$e->getMessage());
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $user->setUser($_POST['user']);
    $user->setSenha($_POST['senha']);

    checkLogin($user->getUser(), $user->getSenha());
}
?>
