<?php
$host = 'mysql-3921bfd8-freeladuo-db.a.aivencloud.com';
$port = 21056;
$user = 'avnadmin';
$pass = 'SUA_SENHA_DO_AIVEN';
$dbname = 'defaultdb';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Se quiser retornar um JSON de sucesso no teste:
    // echo json_encode(["status" => "success", "message" => "Conectado ao Aiven com sucesso!"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Erro de conexão: " . $e->getMessage()]);
    exit;
}
?>