<?php
/**
 * Copiar este archivo a config.php y rellenar valores reales.
 * admin/config.php está en .gitignore y no se sube al repositorio.
 *
 * Tabla `queue`: el panel usa SELECT * y admite varios nombres de columnas.
 *
 * Valores de `status` deben existir en el ENUM de MySQL. Si "rejected" no está,
 * ejecuta p. ej.:
 *   ALTER TABLE queue MODIFY COLUMN status ENUM('pending','approved','processing','done','rejected') NOT NULL DEFAULT 'pending';
 * (ajusta la lista completa a la que ya tengas en phpMyAdmin).
 *
 * Depuración: descomenta la línea ONDECK_ADMIN_DEBUG para ver el error SQL en pantalla.
 */
declare(strict_types=1);

const ONDECK_DB_HOST = 'localhost';
const ONDECK_DB_NAME = 'u617396989_nodo_x7k2m';
const ONDECK_DB_USER = 'u617396989_usr_k9p4w';
const ONDECK_DB_PASS = 'cambiar_por_la_contraseña_real';

/** Contraseña del usuario HTTP Basic "admin" */
const ADMIN_PASSWORD = 'OnDeckAdmin2024';

const QUEUE_STATUS_APPROVED = 'approved';
const QUEUE_STATUS_REJECTED = 'rejected';

// const ONDECK_ADMIN_DEBUG = true;
