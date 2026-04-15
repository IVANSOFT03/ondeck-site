<?php
declare(strict_types=1);

if (!isset($active_page)) {
    $active_page = 'index';
}
require_once __DIR__ . '/init.php';
$b = htmlspecialchars($base, ENT_QUOTES, 'UTF-8');
$abs = htmlspecialchars($assets_base, ENT_QUOTES, 'UTF-8');
$year = (int) date('Y');

switch ($active_page) {
    case 'privacy':
        ?>
<footer class="site-footer site-footer--privacy" role="contentinfo">
    <div class="site-footer__inner">
        <div>
            <div class="site-footer__brand">OnDeck Colectivo</div>
            <p class="site-footer__blurb">Conectando la vanguardia digital a través de datos de alta fidelidad y contenido impulsado por la comunidad.</p>
        </div>
        <div class="site-footer__links">
            <a class="site-footer__link site-footer__link--active" href="<?php echo $b; ?>/privacy">Política de privacidad</a>
            <a class="site-footer__link" href="<?php echo $b; ?>/terms">Términos de servicio</a>
            <a class="site-footer__link" href="<?php echo $b; ?>/#contact">Contacto</a>
        </div>
        <div class="site-footer__legal-note">
            <p class="site-footer__meta">
                © <?php echo $year; ?> OnDeck Colectivo. <br class="footer-br"/> Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>
        <?php
        break;

    case 'terms':
        ?>
<footer class="site-footer site-footer--terms" role="contentinfo">
    <div class="site-footer__inner">
        <div class="site-footer__brand site-footer__brand--mono">OnDeck Colectivo</div>
        <div class="site-footer__links">
            <a class="site-footer__link" href="<?php echo $b; ?>/privacy">Política de privacidad</a>
            <a class="site-footer__link site-footer__link--active" href="<?php echo $b; ?>/terms">Términos de servicio</a>
            <a class="site-footer__link" href="<?php echo $b; ?>/#contact">Contacto</a>
        </div>
        <div class="site-footer__meta site-footer__meta--small">© <?php echo $year; ?> OnDeck Colectivo. Todos los derechos reservados.</div>
    </div>
</footer>
        <?php
        break;

    case 'index':
    default:
        ?>
<footer class="site-footer site-footer--index" role="contentinfo">
    <div class="site-footer__inner">
        <div class="site-footer__row">
            <span class="site-footer__brand site-footer__brand--mono">OD Colectivo</span>
            <span class="site-footer__sep">|</span>
            <span class="site-footer__meta">© <?php echo $year; ?> OnDeck Colectivo. Todos los derechos reservados.</span>
        </div>
        <div class="site-footer__links">
            <a class="site-footer__link" href="<?php echo $b; ?>/privacy">Política de privacidad</a>
            <a class="site-footer__link" href="<?php echo $b; ?>/terms">Términos de servicio</a>
            <a class="site-footer__link" href="#contact">Contacto</a>
        </div>
    </div>
</footer>
        <?php
        break;
}
?>
<script type="module" src="<?php echo $abs; ?>/js/main.js"></script>
