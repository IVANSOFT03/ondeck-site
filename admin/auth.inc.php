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

/**
 * Adapta una fila de `queue` a las claves que usa la vista del panel.
 * Soporta distintos nombres de columnas según el esquema (ondeck-system / tiktok-system).
 */
function ondeck_admin_normalize_queue_row(array $row): array
{
    $file = $row['drive_file_name'] ?? $row['file_name'] ?? $row['filename'] ?? $row['original_filename'] ?? $row['original_name'] ?? '';
    $participant = $row['uploader_name'] ?? $row['participant_name'] ?? $row['participant'] ?? $row['display_name'] ?? $row['name'] ?? '';
    $when = $row['created_at'] ?? $row['uploaded_at'] ?? $row['submitted_at'] ?? $row['inserted_at'] ?? '';
    $driveId = $row['drive_file_id'] ?? $row['drive_id'] ?? $row['google_file_id'] ?? '';

    return [
        'id' => (int) ($row['id'] ?? 0),
        'file_name' => (string) $file,
        'participant_name' => (string) $participant,
        'uploader_email' => (string) ($row['uploader_email'] ?? ''),
        'uploaded_at' => (string) $when,
        'drive_file_id' => (string) $driveId,
    ];
}
