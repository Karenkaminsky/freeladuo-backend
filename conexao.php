<?php
$host = 'freeladuo-db-freeladuo.h.aivencloud.com';
$port = 21056;
$user = 'avnadmin';
$pass = 'AVNS_wj44FuJbSh8zEoGdhgW';
$dbname = 'defaultdb';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Erro de conexão: " . $e->getMessage()]);
    exit;
}
?>