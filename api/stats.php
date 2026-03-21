<?php
define('ROOT_DIR', '/home/u617396989/domains/ondeck.nodo-digital.com/tiktok-system');

require_once ROOT_DIR . '/vendor/autoload.php';
require_once ROOT_DIR . '/config/config.php';
require_once ROOT_DIR . '/src/db/Database.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: https://ondeck.nodo-digital.com');

try {
    $db = Database::getInstance();
    $stmt = $db->pdo()->query("
        SELECT
            COUNT(DISTINCT uploader_email) AS participantes,
            COUNT(CASE WHEN status='done' THEN 1 END) AS publicados,
            COUNT(DISTINCT country) AS paises,
            COUNT(*) AS archivos_total
        FROM queue
    ");
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => true, 'message' => $e->getMessage()]);
}