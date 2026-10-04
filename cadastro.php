<?php
// cadastro.php
error_reporting(0);
ini_set('display_errors', 0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

require_once 'conexao.php';

$rawInput = file_get_contents('php://input');
$data = json_decode($rawInput, true);

if (!$data) {
    $data = $_POST;
}

$nome = isset($data['nome']) ? trim($data['nome']) : '';
$email = isset($data['email']) ? trim($data['email']) : '';
$senha = isset($data['senha']) ? trim($data['senha']) : '';
$tipo_conta = isset($data['tipo_conta']) ? trim($data['tipo_conta']) : 'freelancer';

if (empty($nome) || empty($email) || empty($senha)) {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "Todos os campos obrigatórios devem ser preenchidos."
    ]);
    exit();
}

try {
    // Verifica se o e-mail já está cadastrado
    $stmtCheck = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = ? LIMIT 1");
    $stmtCheck->execute([$email]);

    if ($stmtCheck->fetch()) {
        http_response_code(409); // Conflict
        echo json_encode([
            "status" => "error",
            "message" => "E-mail já cadastrado!"
        ]);
        exit();
    }

    // Insere o novo usuário
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo_conta) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $senha, $tipo_conta]);

    http_response_code(201);
    echo json_encode([
        "status" => "success",
        "message" => "Usuário cadastrado com sucesso!"
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Erro ao realizar cadastro."
    ]);
}
?>