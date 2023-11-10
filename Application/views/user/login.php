<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/login-php/public/assets/css/login.css">
    <style>

    </style>
    <title>Login</title>
</head>

<body>
    <div class="form">
        <div class="box-text">
            <h1>Bem vindo <span style="color:#3dbc40;">Colaborador!</span></h1>
        </div>
        <form action="/login-php/Application\controllers\loginController.php" method="POST" class="content-form">
            <div class="form-group">
                <label for="user">Usuário</label>
                <input type="text" id="user" name="username" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pass">Senha</label>
                <input type="password" id="pass" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn-login">Login</button>

        </form>
    </div>
</body>

</html>