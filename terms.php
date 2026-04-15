<?php
declare(strict_types=1);

$active_page = 'terms';
require_once __DIR__ . '/partials/init.php';
$abs = htmlspecialchars($assets_base, ENT_QUOTES, 'UTF-8');
?><!DOCTYPE html>
<html class="dark" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Términos de Servicio | OnDeck Colectivo</title>
    <?php require __DIR__ . '/partials/head-global.php'; ?>
    <link rel="stylesheet" href="<?php echo $abs; ?>/css/legal.css"/>
</head>
<body class="page-legal page-legal--terms" data-page="terms">
<div class="perspective-grid--terms" aria-hidden="true"></div>
<?php require __DIR__ . '/partials/header.php'; ?>

<main class="terms-main">
    <header class="terms-hero">
        <div class="terms-hero__proto">PROTOCOL_V.2.6</div>
        <h1 class="terms-hero__title">
            Términos de <br/>
            <span class="terms-hero__gradient">Servicio</span>
        </h1>
        <p class="terms-hero__date">Última actualización: abril 2026</p>
    </header>

    <div class="terms-grid">
        <section class="terms-card terms-card--7 glass-panel terms-card--glass reveal">
            <div>
                <div class="terms-card__head">
                    <span class="terms-card__sec">SEC_001</span>
                    <span class="material-symbols-outlined terms-card__icon-top" aria-hidden="true">electric_bolt</span>
                </div>
                <h2 class="terms-card__h2 terms-card__h2--lg text-primary-fixed">1. Uso del servicio</h2>
                <p class="terms-card__p">OnDeck Colectivo es una plataforma gratuita y voluntaria donde cualquier persona puede contribuir contenido a una cuenta de TikTok compartida. Al participar aceptas estas condiciones de uso.</p>
            </div>
            <div class="terms-bar">
                <span class="terms-bar__seg terms-bar__seg--p"></span>
                <span class="terms-bar__seg terms-bar__seg--n"></span>
            </div>
        </section>

        <section class="terms-card terms-card--5 terms-card--low reveal">
            <div class="terms-card__sec">SEC_002</div>
            <h2 class="terms-card__h2 terms-card__h2--lg text-tertiary-fixed">2. Contenido aceptable</h2>
            <ul class="terms-list">
                <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Videos e imágenes originales o con derechos de uso.</span></li>
                <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Cualquier idioma o temática.</span></li>
                <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Máximo 1 archivo por día por participante.</span></li>
                <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Máximo 500MB por archivo.</span></li>
                <li><span class="material-symbols-outlined" aria-hidden="true">check_circle</span><span>Formatos aceptados: MP4, MOV, JPG, PNG.</span></li>
            </ul>
        </section>

        <section class="terms-card terms-card--4 terms-card--high reveal">
            <span class="material-symbols-outlined terms-card__danger-icon" aria-hidden="true">dangerous</span>
            <div class="terms-card__sec">SEC_003</div>
            <h2 class="terms-card__h2 text-secondary">3. Contenido prohibido</h2>
            <p class="terms-card__p terms-card__p--sm">Queda prohibido subir material explícito, violento o ilegal, contenido que viole derechos de autor, spam, contenido generado masivamente por bots, o cualquier material que viole las políticas de TikTok. El equipo de OnDeck revisa cada archivo antes de publicarlo.</p>
        </section>

        <section class="terms-card terms-card--8 glass-panel reveal">
            <div class="terms-split">
                <div>
                    <div class="terms-card__sec">SEC_004</div>
                    <h2 class="terms-card__h2 text-primary">4. Propiedad del contenido</h2>
                    <p class="terms-card__p terms-card__p--sm">El participante conserva todos los derechos sobre su contenido. OnDeck Colectivo actúa únicamente como intermediario de publicación. El contenido se elimina de nuestros servidores tras publicarse en TikTok.</p>
                </div>
                <div class="terms-data-box">
                    <p class="terms-data-box__label">Política de datos</p>
                    <p class="terms-card__p terms-card__p--sm">El contenido se elimina de nuestros servidores tras publicarse en TikTok.</p>
                </div>
            </div>
        </section>

        <section class="terms-card terms-card--6 terms-card--low terms-card--fifo reveal">
            <div class="terms-card__sec">SEC_005</div>
            <h2 class="terms-card__h2">5. Proceso de publicación</h2>
            <div class="terms-steps">
                <div class="terms-step"><span class="terms-step__num">01</span><p class="terms-step__text">El orden de publicación es estrictamente por llegada (FIFO).</p></div>
                <div class="terms-step"><span class="terms-step__num">02</span><p class="terms-step__text">Cada archivo es revisado por el equipo antes de publicarse.</p></div>
            </div>
        </section>

        <section class="terms-card terms-card--6 glass-panel reveal">
            <div class="terms-card__sec">SEC_006</div>
            <h2 class="terms-card__h2">6. Limitación de responsabilidad</h2>
            <p class="terms-card__p terms-card__p--sm">OnDeck no garantiza rendimientos de audiencia o métricas específicas. Nos reservamos el derecho de rechazar cualquier contenido que comprometa la integridad estética o técnica del colectivo sin previo aviso.</p>
            <div class="terms-alert">
                <p class="terms-alert__p">AVISO: La latencia de red y algoritmos externos son ajenos a nuestra infraestructura.</p>
            </div>
        </section>

        <section class="terms-card terms-card--12 terms-cta-row reveal">
            <div>
                <div class="terms-card__sec">SEC_007</div>
                <h2 class="terms-card__h2 text-primary">7. Cancelación</h2>
                <p class="terms-card__p">Puedes retirarte del colectivo en cualquier momento. Para la eliminación de tu rastro de datos, contacta a nuestro centro de mando vía email.</p>
            </div>
            <a class="btn-terms-support" href="mailto:admin@ondeckcolectivo.com">CONTACTAR SOPORTE</a>
        </section>
    </div>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
