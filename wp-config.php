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
define('DB_NAME', 'wp');

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
define('AUTH_KEY',         'DW|af!Bz)L*jd$$~-)r$~K=Ifq16+A.Kk*@|n/L.C2mU_!)Y%9ElU^+g]ja+g(H;');
define('SECURE_AUTH_KEY',  '1w&l$muydp02:N5n<@<-u[I|NQVC{ bz^~~F${o.;4^2z.l>3I>nTIY9tAC)}*cB');
define('LOGGED_IN_KEY',    '} UWU6`<(WrkC{Jl*J35I36FpIWsDEv|jnYKvX1b:oUNpQ%K-CbSXp#? ?-gPD,w');
define('NONCE_KEY',        'C}s{aoi 0<ISV:;jVj:coKCM$xee6m^;K_$|:^{S?/}YjstI_}-_$/3{@} jfxqu');
define('AUTH_SALT',        'xq?Yau|I-&FA-rYiw)!zS~|T:y:Ol|z~ +2/l#QVu-CSXM3m3[w QSL-wo=P+-[;');
define('SECURE_AUTH_SALT', 'pF!SOv$qiBK5FT;eXC~>LfMXn*8,/0AfN<G/ORydB4$#}G=p%-9-?Di]5*#?!y^*');
define('LOGGED_IN_SALT',   'py5;Q_mTJ+3@2tTGnL!aN3o6wMCVnq*Q{p|x0^+4G/|NOmB7y5HgbNe;E|~Oy(5b');
define('NONCE_SALT',       '(>-h>=%Y3v04Y/JF>`HY9)5b+TmssF=n@NM0I91h|-jR|yi9Z3F488.6a%-QRuA3');

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
