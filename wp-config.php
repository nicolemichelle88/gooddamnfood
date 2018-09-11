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
define('DB_NAME', 'gooddamnfood');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'AnQA&^Iu~E0q+i|{7XES<pn5>kKD3*U-;=d7)dNE{u64VreF>J=,[#+WKP]R*&DT');
define('SECURE_AUTH_KEY',  'gFphrG87pPq-dw:oZso]G4|ECQ* YBQ@Yj+n2<.Ypr7$RtkLzV^`en_OS8!4Bc17');
define('LOGGED_IN_KEY',    'X68a$$VTtm @9R5tf/M]=?<(rf4/xE8r]W0PN^E}cTDG| rXs$|kww/i/c>$M%85');
define('NONCE_KEY',        '`:nu-mM!Sx1-$3d3gZoaN==EG%]<HCg:3mIf]+be=IXz-*n[Z+*vQw+,#]G>FyqE');
define('AUTH_SALT',        ' oEPESj=(Y^a{8~{3,79mIEbp}+/6`9(f3d<%&d6)yoA)(!&+h^8rKbrg}Q#2Lc2');
define('SECURE_AUTH_SALT', 'yd&JN}Fa]eJql->f8wXTzZ 7HyLqJ^+i3@b`gta`8:WXfW_qQmzUs&aT,IIWR^+;');
define('LOGGED_IN_SALT',   '!T(Z^H7C&B/GB]09G(t:e 4o5{&^_qRtv/Hh7Cbk)_Xw$wIf&-ku?eqED3BW[.@L');
define('NONCE_SALT',       ']skFt}Mr3L#FMVH6/Bfb-1sq@|>cNOzX+ : ntE=+rFA7do:a9yNHp,?Y-nOG*%~');

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
