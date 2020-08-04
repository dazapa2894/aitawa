<?php
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aitawa_bd' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'F^,{CwRA1M#8H|+t~<UU{3kSs0nCUJA(58LF}pH+B$xS$3r5c7Wgd/j)oPmYg6[^' );
define( 'SECURE_AUTH_KEY',  '.G&5F)%Gi.SzQwHKmtgvT_`X7:q,-y[mWC7dl5M`VE6NG<ULrND0ciqcZ2!R1kX8' );
define( 'LOGGED_IN_KEY',    '@SwNd:JAEApsk%<4aU;AoE{8<<*8(Z1#I%Zo`2~oI3y_;z[f.B|R>xz]SiAkz[ G' );
define( 'NONCE_KEY',        '5(NrD-WVS*$h31D_wtI!6Ym-VWuBlk SWkVo;T7@A^0jom02Qxc-UqgP*Li[B=%{' );
define( 'AUTH_SALT',        '`DaX1)q4X$ukQji~4#5tkp=AV!lLMv@_+,ytSqL<e&:dy?;m7J+Gwu4qQmNx>N2K' );
define( 'SECURE_AUTH_SALT', ':#S)O @xY!zB]ZBxhS&DpR-WS2|*Q=]|hFbtyl&=&@OYK*xCdLwqD<tj_rnppz_;' );
define( 'LOGGED_IN_SALT',   '6g7#,Ip]+d%ZvOUz3MqFR4p%Hl?OL~~KUhDFHq{X%(;AW/IQ&V:0&@mo -,e|3YZ' );
define( 'NONCE_SALT',       '%[^|jhK#4{y6B6u:PCBByCp_@|tmk!|~DsGHcm]7|:LPgHNXKUD18cq9 T8QT)YA' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
