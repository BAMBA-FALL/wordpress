<?php
/**
 * boutique-theme functions & WooCommerce integration.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BOUTIQUE_THEME_VERSION', '1.0.0' );

/**
 * Setup thème : menus, support HTML5, thumbnails.
 */
function boutique_theme_setup() {
    load_theme_textdomain( 'boutique-theme', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support(
        'html5',
        array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' )
    );
    add_theme_support( 'customize-selective-refresh-widgets' );

    register_nav_menus(
        array(
            'primary' => __( 'Menu principal', 'boutique-theme' ),
            'footer'  => __( 'Menu pied de page', 'boutique-theme' ),
        )
    );
}
add_action( 'after_setup_theme', 'boutique_theme_setup' );

/**
 * Support WooCommerce.
 */
function boutique_theme_woocommerce_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'boutique_theme_woocommerce_setup' );

/**
 * Vérifie que WooCommerce est actif avant d'utiliser ses hooks/fonctions.
 */
function boutique_theme_is_woocommerce_active() {
    return class_exists( 'WooCommerce' );
}

/**
 * Enqueue styles & scripts.
 */
function boutique_theme_assets() {
    wp_enqueue_style(
        'boutique-theme-style',
        get_stylesheet_uri(),
        array(),
        BOUTIQUE_THEME_VERSION
    );

    wp_enqueue_script(
        'boutique-theme-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        BOUTIQUE_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'boutique_theme_assets' );

/**
 * Nombre de produits par ligne dans le catalogue WooCommerce.
 */
function boutique_theme_loop_columns() {
    return 3;
}
add_filter( 'loop_shop_columns', 'boutique_theme_loop_columns' );

/**
 * Nombre de produits par page.
 */
function boutique_theme_products_per_page() {
    return 12;
}
add_filter( 'loop_shop_per_page', 'boutique_theme_products_per_page', 20 );

/**
 * Ajoute l'icône panier avec compteur dans le header (utilisée par header.php).
 */
function boutique_theme_cart_link() {
    if ( ! boutique_theme_is_woocommerce_active() ) {
        return;
    }
    ?>
    <a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
        <?php esc_html_e( 'Panier', 'boutique-theme' ); ?>
        (<?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>)
    </a>
    <?php
}

/**
 * Largeur des miniatures produit adaptée au thème.
 */
function boutique_theme_woocommerce_image_dimensions() {
    if ( ! boutique_theme_is_woocommerce_active() ) {
        return;
    }

    $catalog = array(
        'width'  => '400',
        'height' => '400',
        'crop'   => 1,
    );
    update_option( 'woocommerce_thumbnail_image_width', $catalog['width'] );
}
add_action( 'after_switch_theme', 'boutique_theme_woocommerce_image_dimensions' );

/**
 * Widgets footer.
 */
function boutique_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Pied de page', 'boutique-theme' ),
            'id'            => 'footer-widgets',
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'boutique_theme_widgets_init' );
