<?php
include('C:\xampp\htdocs\login-php\Application\core\db_connect.php');
include('C:\xampp\htdocs\login-php\Application\models\clienteModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setIdade($_POST['idade']);
    $cliente->setEmail($_POST['email']);

    // Chamar a função para adicionar cliente ao banco de dados
    adicionarCliente($cliente->getNome(), $cliente->getIdade(), $cliente->getEmail());
}

function adicionarCliente($nome, $idade, $email)
{
    global $conexao; // Importa a conexão com o banco de dados

    // Validar dados (adicionar outras validações conforme necessário)
    if (empty($nome) || empty($idade) || empty($email)) {
        echo "Erro: Preencha todos os campos do formulário.";
        return;
    }

    // Preparar a instrução SQL usando declaração preparada para segurança
    $sql = "INSERT INTO crud_clientes (nome, idade, email) VALUES (?, ?, ?)";

    // Preparar a instrução SQL
    $stmt = mysqli_prepare($conexao, $sql);

    // Verificar se a preparação foi bem-sucedida
    if ($stmt === false) {
        die("Erro na preparação da instrução SQL: " . mysqli_error($conexao));
    }

    // Vincular parâmetros
    mysqli_stmt_bind_param($stmt, "sis", $nome, $idade, $email);

    // Executar a instrução SQL
    if (mysqli_stmt_execute($stmt)) {
        // Limpeza do formulário
        $_POST = [];
        // Redirecionamento
        header("Location: painel.php");
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        echo "Erro ao adicionar cliente: " . mysqli_error($conexao);
    }

}


function obterClientes() {
    global $host, $usuario, $senha, $banco_de_dados;

    $conexao = mysqli_connect($host, $usuario, $senha, $banco_de_dados);

    if (mysqli_connect_errno()) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM crud_clientes";
    $result = mysqli_query($conexao, $sql);

    $clientes = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $clientes[] = $row;
    }


    return $clientes;
}

?>