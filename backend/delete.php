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

        // SE FALHAR A CONEXÃO, RETORNA UM ERRO
        http_response_code(500);
        exit;
    }

    // RECEBE OS DADOS JSON E TRANSFORMA EM UM ARRAY PHP
    $data = json_decode(file_get_contents('php://input'), true);

    // VERIFICA SE A CHAVE 'ID' ESTÁ AUSENTE DO ARRAY $DATA
    if (!isset($data['id'])) {
        // Retorna um erro 400
        http_response_code(400);
        //Retorna um JSON com a mensagem de erro para saber o motivo do erro
        echo json_encode(["error" => "ID não informado."]);
        exit;
    }

    // POPULAR A VARIÁVEL ID
    $id = $data['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    //SE FOR EXECUTADO COM SUCESSO, RETORNA UM JSON COM A MENSAGEM DE SUCESSO
    if ($stmt->execute()) {
        //Mensagem de sucesso
        echo json_encode(["mensagem" => "Usuário excluído com sucesso"]);
    } else {
        //Mensagem de erro
        http_response_code(500);
        echo json_encode(["erro" => "Erro ao excluir usuário"]);
    }
    