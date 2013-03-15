<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'frontendmatters_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'O@Fh`/YB<n.OYII|NQlO4(RnKmWhjc+9FiYRpK(hfID{]T4`8WAi?xa|k13|x Hw');
define('SECURE_AUTH_KEY',  '2D-?KYB(8ifC!f#:h`3C2IqJ-HJs)RC].HD@Pd`+uJ~>;O%^PF;.&*IKXj7_lFO+');
define('LOGGED_IN_KEY',    'Zwks,+)/JIq~F4=|sI)`pSoBvL*vj|8?^qy9IZ^x+F|}FSR0t[EPZjhmPk82ns[-');
define('NONCE_KEY',        'w+8h; Zl|S&ya@fent/7u(2n%)|nrJM6YLZUQi:OgUv#e.{07tC$k2yG!]/5e}-.');
define('AUTH_SALT',        'X(N>x$zO[~;(o)}BbR-K]29-_JzU,cT{ Fr+,?+9Vc (+$2EnpnNh/K#O,IGfFMD');
define('SECURE_AUTH_SALT', 'B3p:)l)* %No9X18W)lt>i,H)) nlssMmjD(u u)3Mf.y7yXJ|vR)@]=1Da7AEpj');
define('LOGGED_IN_SALT',   '~|2Wt`+}qFl14*`NO;2}8~r-X::~3L8<jNliRd_`ITvD=,4;6IKonyO%%w*!+Q_$');
define('NONCE_SALT',       'v.s{mJ%n3u^p#xHhH2!+W(Bbt,We5^Ew+Tf7f5~$0xs7fk-8YT6vwB|-]4,i&?r+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
