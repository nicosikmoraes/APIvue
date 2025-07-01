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
    
    // Conecta ao MySQL (sem especificar banco de dados)
    $conn = new PDO("mysql:host=$host", $userdb, $pass);

    // Define o modo de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria o banco de dados
    $sql = "CREATE DATABASE IF NOT EXISTS apivuedb";
    $conn->exec($sql);

    echo json_encode(["mensagem" => "Banco de dados criado com sucesso"]);