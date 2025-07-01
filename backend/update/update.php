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

    // Database connection
    $host = '127.0.0.1';
    $userdb = 'root';
    $pass = '16052006';
    $db = 'apivuedb';

    // TENTATIVA DE CONEXÃO COM O BANCO DE DADOS
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $userdb, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        http_response_code(500);
        exit;
    }

    // RECEBE OS DADOS JSON E TRANSFORMA EM UM ARRAY PHP
    $data = json_decode(file_get_contents('php://input'), true);

    // VERIFICA SE OS DADOS FORAM RECEBIDOS CORRETAMENTE
    if (!$data) {
        error_log("Erro: JSON inválido recebido");
        http_response_code(400);
        echo json_encode(["erro" => "Dados de login ausentes ou malformados"]);
        exit;
    }

    $allowedColumns = ['nome', 'email', 'senha']; // lista de colunas permitidas
    $column = $data['coluna'];
    $id = $data['id'];
    $newValue = $data['novoValor'];
    
    if (!in_array($column, $allowedColumns)) {
        http_response_code(400);
        echo json_encode(["erro" => "Coluna inválida"]);
        exit;
    }

    // PREPARA A CONSULTA PARA BUSCAR O USUÁRIO DE ACORDO COM O EMAIL
    $stmt = $conn->prepare("UPDATE users SET $column = :valor WHERE id = :id LIMIT 1");
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':valor', $newValue, PDO::PARAM_STR);
    $stmt->execute();
