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
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    itens_carrinho INT DEFAULT 0
)";

$sql_itens = "CREATE TABLE IF NOT EXISTS itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(220) NOT NULL UNIQUE,
    link VARCHAR(420) NOT NULL UNIQUE,
    img VARCHAR(420) NOT NULL UNIQUE,
    valor INT DEFAULT 5,
    hover TINYINT(1) DEFAULT 0
)";

$sql_carts = "CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (item_id) REFERENCES itens(id)
)";

try {
    $conn->exec($sql_users);
    $conn->exec($sql_itens);
    $conn->exec($sql_carts);

    echo json_encode(["mensagem" => "Tabelas criadas com sucesso"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao criar tabelas: " . $e->getMessage()]);
}
