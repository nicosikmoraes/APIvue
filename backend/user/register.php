<?php
// CONFIGURAÇÕES INICIAIS PARA RODAR
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Para requisições OPTIONS (pré-flight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// VARIÁVEL QUE VAI RECEBER TODOS OS USUÁRIOS
$users = [];

    // Database connection
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '16052006';
    $db = 'apivuedb';

    // TENTATIVA DE CONEXÃO COM O BANCO DE DADOS
    try {
        // Conexão com o banco de dados usando PDO
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

        // MODO DE ERROS
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        http_response_code(500);
        exit;
    }

    // RECEBE OS DADOS JSON E TRANSFORMA EM UM ARRAY PHP
    $data = json_decode(file_get_contents('php://input'), true);

    // PEGA OS VALORES ENVIADOS DO FRONTEND E POPULA AS VARIÁVEIS
    $nome = $data['nome'];
    $email = $data['email'];
    $senha = $data['senha'];

    //VERIFICAR SE O EMAIL JÁ EXISTE
    // O COUNT(*) retorna o número de registros que o SELECT encontra, ou seja se encontrar uma conta vai retornar um, duas contas retorna 2 e nenhuma retorna 0;
    $stmt3 = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $stmt3->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt3->execute();

    $emailExists = $stmt3->fetchColumn();

    if ($emailExists > 0) {
        http_response_code(401);
        echo json_encode(["erro" => "Email já cadastrado"]);
        exit;
    }

    // PREPARA A CONSULTA PARA INSERIR UM NOVO USUÁRIO
    $stmt = $conn->prepare("INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)");
    
    // BIND PARAMS
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

    // EXECUTA A CONSULTA
    $executed = $stmt->execute();

    // PREPARA A CONSULTA PARA BUSCAR O USUÁRIO DE ACORDO COM O EMAIL
    $stmt2 = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");

    // BIND PARAMS
    $stmt2->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt2->execute();

    // PEGA OS DADOS DO RESULTADO DA CONSULTA SELECT
    $user_data = $stmt2->fetch(PDO::FETCH_ASSOC);

    // O $result['senha'] é a senha armazenada no banco de dados
    if ($user_data){
        echo json_encode(["mensagem" => "Cadastro realizado com sucesso", "user" => $user_data]);
    } else {
        http_response_code(401);
        echo json_encode(["erro" => "Erro ao cadastrar usuário"]);
    }
