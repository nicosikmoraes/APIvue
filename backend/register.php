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

    // PREPARA A CONSULTA PARA INSERIR UM NOVO USUÁRIO
    $stmt = $conn->prepare("INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)");
    
    // BIND PARAMS
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

    // EXECUTA A CONSULTA
    $executed = $stmt->execute();

    // VERIFICA SE A CONSULTA FOI EXECUTADA COM SUCESSO
    if ($executed) {
        echo json_encode(["mensagem" => "Usuário cadastrado com sucesso"]);
    } else {
        http_response_code(500);
        echo json_encode(["erro" => "Erro ao salvar no banco"]);
    }
