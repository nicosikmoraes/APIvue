<?php
// CONFIGURAÇÕES INICIAIS PARA RODAR
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Para requisições OPTIONS (pré-flight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

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
        echo json_encode(['error' => 'Erro ao conectar ao banco de dados', 'details' => $e->getMessage()]);
        exit;
    }

    //TESTE DE ERRO; para ver oq está sendo recebido
    $raw = file_get_contents('php://input');
    error_log("RAW INPUT: " . $raw);
    
    // RECEBE OS DADOS JSON E TRANSFORMA EM UM ARRAY PHP
    $data = json_decode($raw, true);
    
    // Verifica se o dado recebido está correto
    if (!$data || !isset($data['user_id']) || !isset($data['item_id'])) {
        http_response_code(400);
        echo json_encode(["erro" => "Dados ausentes ou malformados", "raw_input" => $raw]);
        exit;
    }
    
    // PEGA OS VALORES ENVIADOS DO FRONTEND E POPULA AS VARIÁVEIS
    $user_id = $data['user_id'];
    $item_id = $data['item_id'];


    // CONSULTA PARA BUSCAR TODOS OS USUÁRIOS
    $query = "INSERT INTO carts (user_id, item_id) VALUES (:user_id, :item_id)";

    // PREPARA E EXECUTA A CONSULTA
    $stmt = $conn->prepare($query);

    // BIND PARAMS
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);

    try {
        $stmt->execute();
    
        // Retorna uma resposta simples de sucesso
        echo json_encode(["mensagem" => "Item adicionado ao carrinho com sucesso!"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["erro" => "Erro ao adicionar item ao carrinho", "detalhes" => $e->getMessage()]);
    }

    $stmt2 = $conn->prepare("UPDATE users SET itens_carrinho = itens_carrinho + 1 WHERE id = :user_id");
    $stmt2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt2->execute();

    exit;

    
