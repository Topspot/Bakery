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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thecore');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '!H%PeJ%oJNxqu3ZW*fR@B&&-7HH 5$%V%^q})zg,nm >,nKm4EI=]8&sw6k+{f(J');
define('SECURE_AUTH_KEY',  'eR>aiI)yzh+J-@U>#f32un<$ sU%zC9/r6 /fS<s>T~)7|)NFsR;x4`?)~BS7Q%)');
define('LOGGED_IN_KEY',    '&)jp06]TB:_,:.Z(_%yB 8L!KGmvY>k;Aa hz(b_nBd=I>l_iTV9IqfiX>uMt/YY');
define('NONCE_KEY',        '1+Q=J,i0j.{2r|4u%>sw#%0MQk8]Ax[V64Q,tkrJ3d{.z(O*xCj^Y2$#9-:1oUWL');
define('AUTH_SALT',        '}, Ny.m~xT`r62u>gR-sBJ.6F~x(J+NPt}5mLAyBFIgd3LitPJ<1hsk%`N}_4Yp&');
define('SECURE_AUTH_SALT', '4OMyA,8~aH9o=e,:a+A`SzgA9E*i3PtJX^&9[,@mJqDa }fnpvG.)J3<mfhqXn$w');
define('LOGGED_IN_SALT',   '8 W,rW_.g{D7+e`RN6: fnzH^EIG~gnsi`maYuUCAWG9P6fd1-aBX%[SkZCB>#V0');
define('NONCE_SALT',       '$)GHY1xJVxGcb}CEP#4.gXuJwP_jTX4}^*Qf=p^o2Zc1{dx2:w!vN%,Vhkz3Cx+<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
