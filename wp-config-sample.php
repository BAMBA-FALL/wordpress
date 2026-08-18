<?php
/**
 * Configuration WordPress locale/dev.
 * Copier ce fichier vers wp-config.php à la racine (ou dans /wp si installé via composer)
 * et renseigner les valeurs ci-dessous.
 */

define( 'DB_NAME', 'wordpress_ecommerce' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// Clés d'authentification : générer sur https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',         'à-générer' );
define( 'SECURE_AUTH_KEY',  'à-générer' );
define( 'LOGGED_IN_KEY',    'à-générer' );
define( 'NONCE_KEY',        'à-générer' );
define( 'AUTH_SALT',        'à-générer' );
define( 'SECURE_AUTH_SALT', 'à-générer' );
define( 'LOGGED_IN_SALT',   'à-générer' );
define( 'NONCE_SALT',       'à-générer' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/wp/' );
}

require_once ABSPATH . 'wp-settings.php';
