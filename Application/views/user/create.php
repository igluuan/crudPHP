
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/create.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="form">
        <form action="submitCreateController.php" method="post" class="content-form">
            <div class="form-group">
                <label for="user">Usuário</label>
                <input type="text" id="user" name="username" autocomplete="off">
            </div> 
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" autocomplete="off">
            </div> 
            <div class="form-group">
                <label for="pass">Senha</label>
                <input type="password" id="pass" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn-login">Criar</button>
            <a href="index.php">Volte e faça login</a>
        </form>
    </div>

    <script>
        const btnCriar = document.querySelector('.btn-login');

        btnCriar.addEventListener('click', ()=> {
            window.alert('Conta criada com sucesso!')
        })
    </script>
</body>
</html>