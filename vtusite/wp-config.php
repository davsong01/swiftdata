<?php
define( 'WP_CACHE', true );





























/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'swifvmvz_vtudbsite' );

/** MySQL database username */
define( 'DB_USER', 'swifvmvz_vtusiteuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Vtusite@2022' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k8obnaxph60gpgplzjii0tm7d9qpxe4dfthacbyjlpbe0bugip3qsexkmccjshf5' );
define( 'SECURE_AUTH_KEY',  's7bd0kw1zqkjsxzwtnsmidilr29pr8uwzcrc73w0qtky2laqsvsg5ce0u9hhd8qp' );
define( 'LOGGED_IN_KEY',    'm10tyn2wy5gq5iutouz46uexmnx1x1v36p2vznb7djqdqqxtulgmjnt6diaexe4p' );
define( 'NONCE_KEY',        'heexasqe5p2tzvj3gwsxfq5copotxwb5pwrxcsqe5is1caiyvtyohhd3zjebresy' );
define( 'AUTH_SALT',        'ehxi9vpgsb4ffntmhp4sopqxw2sq2crzj5cv911a4tbjqno8a2sxpv62jqeipjbp' );
define( 'SECURE_AUTH_SALT', '8qxi8zrsmbiss9nfwz96x3pgjskueioo7c6mynxe4ujoz5f5kv3vif287n6p2nqb' );
define( 'LOGGED_IN_SALT',   'uspyfke0qb6saoiv9wqglvpvuvwvureawqrxocfwaay8t9fcrdc24nh9dt3ox3xk' );
define( 'NONCE_SALT',       'yqw0njuq16y1thj2bmgmumobmcpbiidy5heowaocjtwopghuevouooqehgivnthy' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpcl_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
