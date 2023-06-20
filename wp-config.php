<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wmcwghxa_ukproject' );

/** Database username */
define( 'DB_USER', 'wmcwghxa_ukproject' );

/** Database password */
define( 'DB_PASSWORD', 'ukproject@123' );

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
define( 'AUTH_KEY',         '1bg3o9gpwqbakkgkkqaqboodwmimtmishll5ln74brcbr9fywginvi2z78xtqukg' );
define( 'SECURE_AUTH_KEY',  'b9fr3vnc3abahcjvyai3rndkohylws6krwvdxipydxsewdlmbj1euvx5sa7bsftz' );
define( 'LOGGED_IN_KEY',    '3mrhppqe7xejr1hv5ivvbgu787geaglnm0s0k819stn2rnoiogfvovcooxnybgdt' );
define( 'NONCE_KEY',        '7o8c6q9hphs1cowgp7bghxkitdzvqsbvlarxohqajniayoxhv9keab1dtddybto3' );
define( 'AUTH_SALT',        'qmcjrklbjqhj9qwtlvktvw6jmcqfjz4zeueewnabhzp5sskgr2f2znsjrwqlj0bs' );
define( 'SECURE_AUTH_SALT', 'v1dxldzwbgqo0oueczdulerwfyqdozx143p9xhel828hvopftcyzvoimfzaskl8a' );
define( 'LOGGED_IN_SALT',   'z6cfmb3vwxumppp2ozxpj945xjzr4m4yvlcqzzhdvpvokc2rjm4qiybd2ff8snol' );
define( 'NONCE_SALT',       'wupvr3gmhr1ami94ewq7vz3y9nxna6xbadk6uqrbgpbnkil2xi4ziu6xdn0vyphz' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpoz_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
