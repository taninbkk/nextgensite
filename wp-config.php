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
define('DB_NAME', 'nextgensite');

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
define('AUTH_KEY',         'd!1!N0HwgNc^Ph`lp,dRUhj_3~gs:KP`U{U~.r*Rh4SP+@_KB;_ES@-Zk.hS`}u`');
define('SECURE_AUTH_KEY',  ',5d5w42u|2YO7,f mOvselxrt`7bQ4GJ9l%4jtTtkIt_gU/B$v4WnM@C75mpo4<1');
define('LOGGED_IN_KEY',    'Lu/DJI0?$E0h%nRt]I2zFgcN:V1{M*A!0>d.k,)9#[ILjtR3z`C#g)Vsoqd11q,@');
define('NONCE_KEY',        'EnS[W@P]{XR&y#ZQN=@Cs?e *}A%h:v5ea4?79DW/=1V-@T`oC~34V)PIGKvgJ(L');
define('AUTH_SALT',        'PqK%-}rpLoPt3!0R9Y?W2zXK^e)RIy94$$NDV{!VO~]a6>Bhi:9+<q$>/9&bWDb ');
define('SECURE_AUTH_SALT', 'a)Q6&Rvz#88CH%BNqdz<Z[o6]&_| 5#`.H6Tl!O;Pc&j0>ZtiQfxr=_GIQXb#2^3');
define('LOGGED_IN_SALT',   ':H^:A7R}0?vtiX9wXDL?3%$Pn*MKP^?>{uI7CR`kPXf{3e&$ :2a3n_G{0C*Pi1R');
define('NONCE_SALT',       'nMj[cj%:@gZ>a.FipF_f3DTXu&4CrA:frVD!:M7C{A:yskRwjhDT];JvU6RFuRsq');

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
