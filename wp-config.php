<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'unavidamejor' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'b/uG36-AzUzq(M#lrpYj}>QGr-PyW~9%2.b/BX~PN717CD4{~,/f9ZO5XO_fewRB' );
define( 'SECURE_AUTH_KEY',  'Mo3jGzc]#kL-$Z~wUeskU~(,r&MS5o)W81v%<10*Qwf>o=%4W[}q8FTPMt%mia#?' );
define( 'LOGGED_IN_KEY',    'Z:.+ swE}gX[Ahe*Ir9}t$`D-chQ]C^BK(*FF?la6(&2`fJV7&Dy%~SYcpt>gRE>' );
define( 'NONCE_KEY',        'oO>7k.|~%+ Nab*C4--EF]iZjGzOvNY?,?G`Y-A2oVyhG<o;o0.+N|KhZ8qihY/D' );
define( 'AUTH_SALT',        'HV$M%3IK;7d<`!B{zi`N<L50bTi<?`~et`nJ~p4o}:d~4{f>(Vzx>JzO5VVu3r>`' );
define( 'SECURE_AUTH_SALT', 'o9D-F0.HI.e-2J3t1UM+vBJ[!)Oj;c%09va`p4qc$_Q1K d^B<_i>{fHv^{^7aeX' );
define( 'LOGGED_IN_SALT',   'jHL>|qu+ntxebmP:?_y68M-gPc9!k<La&E6e`sNa58r7> M)H)BTT8]-R1plqtAd' );
define( 'NONCE_SALT',       'w:Wl&_XRU=`W4% s2wILaFNLLB$>kGz5(#/@iqyG(~M*/klyUUUo!wE$+>:=K1()' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'uvm_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

// Detección de dominio para permitir acceso por ngrok y localhost
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

$current_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$current_scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$current_base = $current_scheme . '://' . $current_host;

// Ruta base de WP dentro del host actual
$wp_base_path = '/unavidamejor';

// Fijar dinámicamente HOME y SITEURL según el host actual
// define('WP_HOME',    $current_base . $wp_base_path);
// define('WP_SITEURL', $current_base . $wp_base_path);

// Forzar SSL en admin sólo si estamos en HTTPS
define('FORCE_SSL_ADMIN', $current_scheme === 'https');



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
