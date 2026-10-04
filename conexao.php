<?php
// conexao.php
error_reporting(0);
ini_set('display_errors', 0);

// Lê variáveis de ambiente do Render ou usa padrão
$host = getenv('DB_HOST') ?: 'SEU_HOST_MYSQL';
$db   = getenv('DB_NAME') ?: 'NOME_DO_BANCO';
$user = getenv('DB_USER') ?: 'USUARIO';
$pass = getenv('DB_PASS') ?: 'SENHA';
$port = getenv('DB_PORT') ?: '3306';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode([
        "status" => "error", 
        "message" => "Erro de conexão com o banco de dados."
    ]);
    exit();
}
?>