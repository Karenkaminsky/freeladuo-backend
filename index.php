<?php
// index.php
header("Content-Type: application/json; charset=UTF-8");

echo json_encode([
    "status" => "online",
    "message" => "API FreelaDuo rodando com sucesso no Render!"
]);
?>