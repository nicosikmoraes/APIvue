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
    $host = 'localhost';
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

        // SE FALHAR A CONEXÃO, RETORNA UM ERRO
        http_response_code(500);
        exit;
    }

    // CONSULTA PARA BUSCAR TODOS OS USUÁRIOS
    $query = "SELECT * FROM users";

    // PREPARA E EXECUTA A CONSULTA
    $stmt = $conn->prepare($query);

    // SE A CONSULTA FOR EXECUTADA COM SUCESSO, BUSCA TODOS OS USUÁRIOS
    $stmt->execute();

    // BUSCA TODOS OS USUÁRIOS E ARMAZENA NA VARIÁVEL $users
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);

    exit;

    // Abrir o php | php -S localhost:8000