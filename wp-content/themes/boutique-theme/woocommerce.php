<?php
/**
 * Template racine requis par WooCommerce pour les pages boutique/produit/panier/commande.
 * @see https://woocommerce.com/document/woocommerce-theme-developer-handbook/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header( 'shop' );
?>

<main class="site-content woocommerce-content">
    <?php woocommerce_content(); ?>
</main>

<?php
get_footer( 'shop' );
