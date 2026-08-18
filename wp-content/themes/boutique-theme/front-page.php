<?php
/**
 * Page d'accueil : met en avant la boutique WooCommerce.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main class="site-content front-page">
    <section class="hero">
        <h1><?php bloginfo( 'name' ); ?></h1>
        <p><?php bloginfo( 'description' ); ?></p>
    </section>

    <?php if ( function_exists( 'wc_get_page_id' ) ) : ?>
        <section class="featured-products">
            <h2><?php esc_html_e( 'Nos produits', 'boutique-theme' ); ?></h2>
            <?php echo do_shortcode( '[products limit="8" columns="4" orderby="date"]' ); ?>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
