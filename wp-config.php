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
define('DB_NAME', 'csi');

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
define('AUTH_KEY',         '0vlJ)rYA!yde-?2/oxpc*xd=kI`AQ#=(-1xB)*MN+uyW7;|>MuYEYoC!|U:t{:Ox');
define('SECURE_AUTH_KEY',  'fy8AhK}O` XKvr(m5rxaX;mjfh}TT&ksBq;0qf/.HF.y&Dx(&m`|1[1_G&]HCfjr');
define('LOGGED_IN_KEY',    'x$wP)-T_x+K7:!Ul2Lb.16GgaUvR>ZPV|1Ps!fpyf&)K|s.$i1<OEm{J:zy1!S@+');
define('NONCE_KEY',        'usxC)*EhR2k^5!R/.0hw-hx}$nS|$$U]=zvn65=;/^8R[{uK!XqSxqN]RO!jc8K_');
define('AUTH_SALT',        'hING>)SCDyx`h0DQn~R^TacIhVs@!hNh42oKO[?/ixvM1>kf6e0=rRt4~;,]Hub^');
define('SECURE_AUTH_SALT', 'l*v$CtUN$zs+t:FSx&Z>Yw@DJc4[&3MDX-c*cryE0HkoH$/6J;~<itwc+4[$CGp!');
define('LOGGED_IN_SALT',   'RLn[l(E+q$+(iOPEK`>J?A+)6;*^Fpy/v9cqwFBNE<?ct][Pqr;>XT/e  }Pi8!H');
define('NONCE_SALT',       'n^KmdN3%N(kk%%>(07}yy^?i>xFf?LB73=u aFiw[!}DrZcQz<[9DvM9&5,9S0 I');

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
