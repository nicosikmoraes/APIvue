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

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $userdb, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Falha na conexão com o banco de dados']);
    exit;
}

// Criação das tabelas
$sql_rick = "INSERT IGNORE INTO itens (titulo, link, img) VALUES (
    'Rick and Morty',
    'https://github.com/nicosikmoraes/rickandmorty-api',
    'src/assets/images/rick.jpeg'
    
)";

$sql_pomodoro = "INSERT IGNORE INTO itens (titulo, link, img) VALUES (
    'Pomodoro',
    'https://github.com/nicosikmoraes/pomodoro',
    'src/assets/images/pomodoro.png'
)";

try {
    $conn->exec($sql_rick);
    $conn->exec($sql_pomodoro);

    echo json_encode(["mensagem" => "Insertido com sucesso"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao inserir dados: " . $e->getMessage()]);
}
