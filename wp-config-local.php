<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ng-wp');

/** MySQL database username */
define('DB_USER', 'ng-wp');

/** MySQL database password */
define('DB_PASSWORD', 'ng-wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', 'http://localhost/ng-wp');
define('WP_SITEURL', 'http://localhost/ng-wp');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'PEEc-vrC^:8S+z|-0$4Rp57M8k2%%-e|C-qaMOv;Eu]beKZ|&+J9l5nFi1+4`0r(');
define('SECURE_AUTH_KEY',  '#o|5lQDN;5~4SV3`~c0sswn%=!Ak2+VA,, &@OY1(p{+qg6C,#LKT/1at fe7m% ');
define('LOGGED_IN_KEY',    'Saxf]-q#NU6x4;Q8->;.^-;/m[Xuo5XFNZZ)I5T<O2cD*{ UKTOw)H(e(8tRq!{{');
define('NONCE_KEY',        '3Fu|t;kb[(IXPC1eb+ID!vBkIdMTQj@||[` G]}YaIgQs!m#.Zij8AdBOxLUm5&#');
define('AUTH_SALT',        'ZoKq,(O=Le^=VWuX/#cf`v-g_H=`w* &P6(7uv.h{Tu-l<Y@q>uzRLjq|+|I{Y_7');
define('SECURE_AUTH_SALT', 'rw&<94-Qz}l<JR;QQxnzS:?ab/}prHOa2].<jMD[J+,O^jcIn86I-gnaKqC9ez@.');
define('LOGGED_IN_SALT',   '/rHQ$Z%t=sykg1cI.|q,[$4-koB*b|~CXiICa=lH/s``6!Eo!{S=CJ4 [Ybl_~K|');
define('NONCE_SALT',       'UT-me|6_B>nK[H4+&2YX2@}8}A{#EKp#Vg]=5:7>@zm4@BS_2>oG0_-U:U;f._JR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
