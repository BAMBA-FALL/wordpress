<?php
/**
 * Pied de page du thème boutique-theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<footer class="site-footer">
    <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
        <?php dynamic_sidebar( 'footer-widgets' ); ?>
    <?php endif; ?>

    <nav class="footer-navigation">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => false,
            )
        );
        ?>
    </nav>

    <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
