<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.inc.php';
ondeck_admin_require_basic_auth();

$rows = [];
$error = null;
try {
    $pdo = ondeck_admin_pdo();
    $stmt = $pdo->query("
        SELECT
            id,
            drive_file_name AS file_name,
            uploader_name AS participant_name,
            uploader_email,
            created_at AS uploaded_at,
            drive_file_id
        FROM queue
        WHERE status = 'pending'
        ORDER BY created_at ASC
    ");
    $rows = $stmt->fetchAll();
} catch (Throwable $e) {
    error_log('admin/index.php queue: ' . $e->getMessage());
    $error = 'No se pudo cargar la cola. Comprueba la tabla `queue` y los nombres de columnas.';
}

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html class="dark" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="noindex, nofollow"/>
    <title>Moderación · OnDeck</title>
    <link rel="stylesheet" href="../assets/css/variables.css"/>
    <link rel="stylesheet" href="../assets/css/main.css"/>
    <style>
      .admin-wrap { max-width: var(--container-max); margin: 0 auto; padding: var(--space-8) var(--space-6); min-height: 100vh; }
      .admin-head { margin-bottom: var(--space-8); border-bottom: 1px solid var(--color-outline-variant); padding-bottom: var(--space-4); }
      .admin-head h1 { font-family: var(--font-headline); font-size: 1.75rem; margin: 0 0 var(--space-2); background: linear-gradient(to right, var(--color-accent-cyan), var(--color-tertiary-container)); -webkit-background-clip: text; background-clip: text; color: transparent; }
      .admin-head p { margin: 0; color: var(--color-on-surface-variant); font-size: 0.9375rem; }
      .admin-table-wrap { overflow-x: auto; border: 1px solid var(--color-outline-variant); border-radius: var(--radius-lg); background: var(--color-surface-container); }
      .admin-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
      .admin-table th, .admin-table td { padding: var(--space-3) var(--space-4); text-align: left; border-bottom: 1px solid var(--color-outline-variant); vertical-align: middle; }
      .admin-table th { font-family: var(--font-headline); font-weight: 600; color: var(--color-accent-muted); background: var(--color-surface-container-low); }
      .admin-table tr:last-child td { border-bottom: none; }
      .admin-table a { color: var(--color-accent-cyan); text-decoration: underline; text-underline-offset: 2px; }
      .admin-table a:hover { color: var(--color-primary-fixed); }
      .admin-actions { display: flex; flex-wrap: wrap; gap: var(--space-2); }
      .admin-btn { display: inline-flex; align-items: center; justify-content: center; padding: var(--space-2) var(--space-4); border-radius: var(--radius-md); font-family: var(--font-headline); font-size: 0.8125rem; font-weight: 600; transition: opacity 0.2s; }
      .admin-btn:hover { opacity: 0.92; }
      .admin-btn--ok { background: linear-gradient(135deg, var(--color-on-primary-container), #004a47); color: var(--color-primary-fixed); border: 1px solid var(--color-outline-variant); }
      .admin-btn--no { background: var(--color-surface-container-highest); color: var(--color-error); border: 1px solid var(--color-outline-variant); }
      .admin-empty { padding: var(--space-12); text-align: center; color: var(--color-on-surface-variant); }
      .admin-error { padding: var(--space-4); background: var(--color-error-container); color: var(--color-on-error-container); border-radius: var(--radius-md); margin-bottom: var(--space-6); }
    </style>
</head>
<body>
<div class="admin-wrap">
    <header class="admin-head">
        <h1>Panel de moderación</h1>
        <p>Contenido pendiente antes de publicar en TikTok.</p>
    </header>

    <?php if ($error !== null) : ?>
        <p class="admin-error" role="alert"><?php echo h($error); ?></p>
    <?php endif; ?>

    <?php if ($error === null && count($rows) === 0) : ?>
        <p class="admin-empty">No hay contenido pendiente de moderación.</p>
    <?php elseif ($error === null) : ?>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Archivo</th>
                    <th>Participante</th>
                    <th>Email</th>
                    <th>Fecha subida</th>
                    <th>Drive</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $row) :
                    $id = (int) $row['id'];
                    $driveId = trim((string) ($row['drive_file_id'] ?? ''));
                    $driveUrl = $driveId !== ''
                        ? 'https://drive.google.com/file/d/' . h($driveId) . '/view'
                        : '';
                    $when = $row['uploaded_at'] ?? '';
                    $whenFmt = $when !== '' ? date('d/m/Y H:i', strtotime((string) $when)) : '—';
                    ?>
                    <tr>
                        <td class="font-mono"><?php echo h((string) $id); ?></td>
                        <td><?php echo h((string) ($row['file_name'] ?? '')); ?></td>
                        <td><?php echo h((string) ($row['participant_name'] ?? '')); ?></td>
                        <td><?php echo h((string) ($row['uploader_email'] ?? '')); ?></td>
                        <td class="font-mono"><?php echo h($whenFmt); ?></td>
                        <td>
                            <?php if ($driveUrl !== '') : ?>
                                <a href="<?php echo $driveUrl; ?>" target="_blank" rel="noopener noreferrer">Abrir en Drive</a>
                            <?php else : ?>
                                —
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="admin-actions">
                                <form method="post" action="action.php">
                                    <input type="hidden" name="action" value="approve"/>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                    <button type="submit" class="admin-btn admin-btn--ok">Aprobar</button>
                                </form>
                                <form method="post" action="action.php">
                                    <input type="hidden" name="action" value="reject"/>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                    <button type="submit" class="admin-btn admin-btn--no">Rechazar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
