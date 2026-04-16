<?php
declare(strict_types=1);

$active_page = 'privacy';
require_once __DIR__ . '/partials/init.php';
$abs = htmlspecialchars($assets_base, ENT_QUOTES, 'UTF-8');
?><!DOCTYPE html>
<html class="dark" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Política de Privacidad | OnDeck Colectivo</title>
    <?php require __DIR__ . '/partials/head-global.php'; ?>
    <link rel="stylesheet" href="<?php echo $abs; ?>/css/legal.css"/>
</head>
<body class="page-legal page-legal--privacy" data-page="privacy">
<?php require __DIR__ . '/partials/header.php'; ?>

<main class="legal-main">
    <div class="legal-main__bg-grid perspective-grid--legal" aria-hidden="true"></div>
    <div class="legal-main__blob-tr" aria-hidden="true"></div>
    <div class="legal-main__blob-bl" aria-hidden="true"></div>

    <article class="legal-article">
        <header class="legal-hero">
            <div class="legal-hero__rule-wrap">
                <span class="legal-hero__rule"></span>
                <span class="legal-hero__tag">Legal Document / REF_OD_2024</span>
            </div>
            <h1 class="legal-hero__title">
                Política de <br/>
                <span class="legal-hero__title-stroke">Privacidad</span>
            </h1>
            <p class="legal-hero__date">Última actualización: abril 2026</p>
        </header>

        <div class="legal-sections">
            <section class="legal-block reveal">
                <div class="legal-block__inner">
                    <div class="legal-block__aside">
                        <span class="legal-block__label legal-block__label--p">01 // INFORMACIÓN QUE RECOPILAMOS</span>
                        <h2 class="legal-block__h2">Información que recopilamos</h2>
                    </div>
                    <div class="legal-block__body">
                        <p class="legal-block__p">Para gestionar tu participación en OnDeck Colectivo recopilamos únicamente:</p>
                        <ul class="legal-block__list">
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Nombre de usuario y correo electrónico</span></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Archivos de video e imagen que subes a Google Drive</span></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Fecha y hora de subida de cada archivo</span></li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="legal-block legal-block--s2 reveal">
                <div class="legal-block__inner">
                    <div class="legal-block__aside">
                        <span class="legal-block__label legal-block__label--s">02 // CÓMO USAMOS LA INFORMACIÓN</span>
                        <h2 class="legal-block__h2">Cómo usamos tu información</h2>
                    </div>
                    <div class="legal-block__body">
                        <p class="legal-block__p">Usamos tus datos exclusivamente para:</p>
                        <ul class="legal-block__list">
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Gestionar tu turno en la cola de publicación</span></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Notificarte por email cuando tu contenido sea publicado</span></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Contactarte si tu contenido es rechazado</span></li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="legal-block reveal">
                <div class="legal-block__inner">
                    <div class="legal-block__aside">
                        <span class="legal-block__label legal-block__label--p">03 // SERVICIOS DE TERCEROS</span>
                        <h2 class="legal-block__h2">Servicios de terceros</h2>
                    </div>
                    <div class="legal-block__body">
                        <p class="legal-block__p">OnDeck Colectivo utiliza estos servicios externos para funcionar. Cada uno tiene su propia política de privacidad:</p>
                        <div class="legal-eco">
                            <a class="legal-eco__chip glass-panel" href="https://policies.google.com/privacy" rel="noopener noreferrer" target="_blank">
                                <span class="material-symbols-outlined" aria-hidden="true">cloud</span>
                                <span>Google Drive</span>
                            </a>
                            <a class="legal-eco__chip glass-panel" href="https://www.tiktok.com/legal/privacy-policy" rel="noopener noreferrer" target="_blank">
                                <span class="material-symbols-outlined" aria-hidden="true">music_note</span>
                                <span>TikTok</span>
                            </a>
                            <a class="legal-eco__chip glass-panel" href="https://www.hostinger.com/legal/privacy-policy" rel="noopener noreferrer" target="_blank">
                                <span class="material-symbols-outlined" aria-hidden="true">dns</span>
                                <span>Hostinger</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="legal-block legal-block--s3 reveal">
                <div class="legal-block__inner">
                    <div class="legal-block__aside">
                        <span class="legal-block__label legal-block__label--t">04 // COOKIES</span>
                        <h2 class="legal-block__h2">Cookies</h2>
                    </div>
                    <div class="legal-block__body">
                        <p class="legal-block__p">Este sitio web usa únicamente cookies técnicas necesarias para su funcionamiento. No usamos cookies de rastreo publicitario ni compartimos tu información con anunciantes.</p>
                    </div>
                </div>
            </section>

            <section class="legal-block reveal">
                <div class="legal-block__inner">
                    <div class="legal-block__aside">
                        <span class="legal-block__label legal-block__label--p">05 // TUS DERECHOS</span>
                        <h2 class="legal-block__h2">Tus derechos</h2>
                    </div>
                    <div class="legal-block__body">
                        <p class="legal-block__p">Tienes derecho a:</p>
                        <ul class="legal-block__list">
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Solicitar acceso a tus datos personales</span></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Corregir información incorrecta</span></li>
                            <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Solicitar la eliminación permanente de tus datos</span></li>
                        </ul>
                        <p class="legal-block__p">Para ejercer cualquiera de estos derechos escríbenos a <a class="legal-inline-link" href="mailto:contacto@ondeck.nodo-digital.com">contacto@ondeck.nodo-digital.com</a>.</p>
                    </div>
                </div>
            </section>

            <section class="legal-contact-block glass-panel reveal">
                <span class="material-symbols-outlined legal-contact-block__icon" aria-hidden="true">terminal</span>
                <span class="legal-block__label legal-block__label--p">06 // CONTACTO</span>
                <h2 class="legal-contact-block__h2">Contacto</h2>
                <p class="legal-block__p">Si tienes preguntas sobre esta política de privacidad o sobre el manejo de tus datos escríbenos:</p>
                <a class="legal-contact-block__a" href="mailto:contacto@ondeck.nodo-digital.com">contacto@ondeck.nodo-digital.com</a>
            </section>
        </div>
    </article>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
