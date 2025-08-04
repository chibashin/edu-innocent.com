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
define('DB_NAME', 'adlil_eduinnocent');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', 'root');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', 'http://edu-innocent.local');
define('WP_SITEURL', 'http://edu-innocent.local');

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
define('AUTH_KEY',         '#!f6e/=$FKx*39z3Y2v=Q5&1sSoGd^zqtDgfqn(=N8u9jO#<?t`-q,%?6|VOO?[7');
define('SECURE_AUTH_KEY',  '`EitcPoRPhADJ3(d!_>g}SJN]eqADgSKF1xZV0MWeApYjM-KZEtRY<S}stQqk<Sf');
define('LOGGED_IN_KEY',    'E~JsDn*`z3{)b0zyRoqw@XTn?;=AubK=GkE]:M#*m<5S0Q9|FJ$Dd:{|MV[=JjEc');
define('NONCE_KEY',        'yB}2Na63yw%(Ogkp{5H^o/K h@AMcp=6x6/b28mg$L]-,,jSZo;L7ecw+@w}1m%T');
define('AUTH_SALT',        ')JaLLXUUo2L>Hq?`pGVre)F87v h|y`N*8{!u<NuT/y%nSp<dic)6-bZ1Oz=EI8c');
define('SECURE_AUTH_SALT', '7(bzMNnDPBe^A(uDa84=?RDKm+Y5QuN*IdLFp4$(.TgZ.`B7OA1]+Zvx5LIjMyx_');
define('LOGGED_IN_SALT',   '%$]sEU#1?VlETm2VR+h[fr3gF2=EB{s>&CptnKC-I:EfJ0*miOS;Pm^4Ex~{THK{');
define('NONCE_SALT',       'Yf<A$xZC2Wp*sz5H:MbBN^h~uasP]wchxxqx^%0c>$|G$iz2.[;@owj3Q{7J2M/{');

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
