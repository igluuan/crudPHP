<?php
include( 'C:\xampp\htdocs\login-php\Application\controllers\crudController.php');
session_start();
// Redireciona para a página de login se o usuário não estiver autenticado
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['user'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && $_POST['submit'] == 1) {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    // Chama a função para adicionar cliente
    adicionarCliente($nome, $idade, $email);
    
}
$clientes = obterClientes();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/login-php/public/assets/css/painel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <nav class="nav">
        <div class="box-user">
            <h1><span style="color:white;">Bem vindo,</span> <?php echo $username; ?>!</h1>
        </div>
        <div class="new-user">
            <a href="/login-php/Application/views/user/create.php">Novo funcionário</a>
            <a href="/login-php/Application/views/user/login.php">Sair</a>
        </div>
    </nav>
    <div class="diviser-line"></div>
    <div class="painel">
        <h1>Clientes</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($clientes) && count($clientes) > 0) : ?>
                <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['idade']; ?> anos</td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><a href='editar.php?id=<?php echo $cliente['id']; ?>'>Editar</a> | <a
                            href='excluir.php?id=<?php echo $cliente['id']; ?>'>Excluir</a></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan='4'>Nenhum registro encontrado</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <button class="addCliente">Novo Cliente</button>
    </div>
    <div id="myModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="form">
                <form method="POST" class="content-form">
                <input type="hidden" name="submit" value="1">

                    <div class="form-group">
                        <label for="user">Nome</label>
                        <input type="text" id="user" name="nome" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="idade">Idade</label>
                        <input type="text" id="idade" name="idade" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" autocomplete="off">
                    </div>
                    <button type="submit" class="btn-adicionar" name="submit">Adicionar</button>
                </form>
            </div>

        </div>
    </div>
    <script>
    // Obtém o modal
    var modal = document.getElementById('myModal');

    // Obtém o botão que abre o modal
    var btn = document.querySelector('.addCliente');

    // Obtém o elemento <span> que fecha o modal
    var span = document.getElementsByClassName('close')[0];

    // Quando o usuário clica no botão, abre o modal
    btn.onclick = function() {
        modal.style.display = 'block';
    }

    // Quando o usuário clica no <span> (x), fecha o modal
    span.onclick = function() {
        modal.style.display = 'none';
    }

    // Quando o usuário clica fora do modal, fecha-o
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    </script>
</body>

</html>