<?php
// Cabeçalhos
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// Conexão com o banco
$host = '127.0.0.1';
$user = 'root';
$pass = '16052006';
$db   = 'apivuedb';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao conectar ao banco de dados"]);
    exit;
}

// Recebe JSON do frontend
$data = json_decode(file_get_contents('php://input'), true);

// Validação
if (!isset($data['id'])) {
    http_response_code(400);
    echo json_encode(["erro" => "ID não informado."]);
    exit;
}

$id = $data['id'];

try {
    // Deleta carrinho primeiro (opcional, por organização)
    $stmt2 = $conn->prepare("DELETE FROM carts WHERE user_id = :user_id");
    $stmt2->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt2->execute();

    // Depois deleta o usuário
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode(["mensagem" => "Usuário e carrinho excluídos com sucesso"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao excluir: " . $e->getMessage()]);
}