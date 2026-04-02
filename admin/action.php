<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.inc.php';
ondeck_admin_require_basic_auth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php', true, 303);
    exit;
}

$action = $_POST['action'] ?? '';
$idRaw = $_POST['id'] ?? '';
$id = filter_var($idRaw, FILTER_VALIDATE_INT);

if ($id === false || $id < 1 || !in_array($action, ['approve', 'reject'], true)) {
    header('Location: index.php', true, 303);
    exit;
}

$approved = defined('QUEUE_STATUS_APPROVED') ? QUEUE_STATUS_APPROVED : 'approved';
$rejected = defined('QUEUE_STATUS_REJECTED') ? QUEUE_STATUS_REJECTED : 'rejected';
$status = $action === 'approve' ? $approved : $rejected;

try {
    $pdo = ondeck_admin_pdo();
    $stmt = $pdo->prepare('UPDATE queue SET status = ? WHERE id = ?');
    $stmt->execute([$status, $id]);
} catch (Throwable $e) {
    // Falla silenciosa y vuelve al listado; el error se puede registrar en servidor si hace falta
}

header('Location: index.php', true, 303);
exit;
