<?php
// CONFIGURAÇÕES INICIAIS PARA RODAR
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Exibir erros para depuração
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Para requisições OPTIONS (pré-flight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// VARIÁVEL QUE VAI RECEBER TODOS OS USUÁRIOS
$users = [];

    // Database connection
    $host = '127.0.0.1';
    $userdb = 'root';
    $pass = '16052006';
    $db = 'apivuedb';

    // TENTATIVA DE CONEXÃO COM O BANCO DE DADOS
    try {
        // Conexão com o banco de dados usando PDO
        $conn = new PDO("mysql:host=$host;dbname=$db", $userdb, $pass);

        // MODO DE ERROS
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // SE FALHAR A CONEXÃO, RETORNA UM ERRO
        http_response_code(500);
        exit;
    }

    // RECEBE OS DADOS JSON E TRANSFORMA EM UM ARRAY PHP
    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['user_id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // SE A CONSULTA FOR EXECUTADA COM SUCESSO, BUSCA TODOS OS USUÁRIOS
    $stmt->execute();

    // PEGA OS DADOS DO RESULTADO DA CONSULTA SELECT
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_data){
        echo json_encode(["mensagem" => "Usuário encontrado com sucesso", "user" => $user_data]);
    } else {
        http_response_code(401);
        echo json_encode(["erro" => "Usuário não encontrado"]);
    }