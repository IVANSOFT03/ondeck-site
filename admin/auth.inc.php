<?php
declare(strict_types=1);

$configPath = __DIR__ . '/config.php';
if (!is_readable($configPath)) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Configuración no encontrada. Copie admin/config.example.php a admin/config.php.';
    exit;
}

require_once $configPath;

function ondeck_admin_require_basic_auth(): void
{
    $user = $_SERVER['PHP_AUTH_USER'] ?? '';
    $pass = $_SERVER['PHP_AUTH_PW'] ?? '';
    if ($user !== 'admin' || !hash_equals(ADMIN_PASSWORD, $pass)) {
        header('WWW-Authenticate: Basic realm="OnDeck Moderación"');
        http_response_code(401);
        header('Content-Type: text/plain; charset=utf-8');
        echo 'No autorizado';
        exit;
    }
}

function ondeck_admin_pdo(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            ONDECK_DB_HOST,
            ONDECK_DB_NAME
        );
        $pdo = new PDO($dsn, ONDECK_DB_USER, ONDECK_DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $pdo;
}
