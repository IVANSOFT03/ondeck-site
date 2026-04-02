<?php
/**
 * Copiar este archivo a config.php y rellenar valores reales.
 * admin/config.php está en .gitignore y no se sube al repositorio.
 *
 * La tabla `queue` (ondeck-system) usa: drive_file_name, uploader_name,
 * created_at, etc. El panel hace SELECT con alias (file_name, participant_name,
 * uploaded_at) para la vista.
 */
declare(strict_types=1);

const ONDECK_DB_HOST = 'localhost';
const ONDECK_DB_NAME = 'u617396989_nodo_x7k2m';
const ONDECK_DB_USER = 'u617396989_usr_k9p4w';
const ONDECK_DB_PASS = 'cambiar_por_la_contraseña_real';

/** Contraseña del usuario HTTP Basic "admin" */
const ADMIN_PASSWORD = 'OnDeckAdmin2024';
