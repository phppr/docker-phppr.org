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

// Include local configuration
if (file_exists(dirname(__FILE__) . '/wp-config.dev.php')) {
    include(dirname(__FILE__) . '/wp-config.dev.php');
}
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if (!defined('DB_NAME')) {
    define('DB_NAME', '');
}

/** MySQL database username */
if (!defined('DB_USER')) {
    define('DB_USER', '');
}

/** MySQL database password */
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}

/** MySQL hostname */
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
    // define('DB_CHARSET', 'utf8mb4');
    define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
    define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '17zw0lpwd7qmf3mlx8epjfbxlxr8xa33svargvbrimpx7twx7vbi8dmmm3nea3z1');
define('SECURE_AUTH_KEY',  'qzbuzgrtappa86x2gkdrmcadm68iyjhqcazjleukabnfijo4bxcyg7ppllwdfr5q');
define('LOGGED_IN_KEY',    'saccyy9k1jk36yyjhr87ptygf1mwown74yjd3d1pvmduz18clnlsrtplzmflmngv');
define('NONCE_KEY',        '4xoflzbwc5hpmoluvms2zr3eygw1318mup3h0mljysju7mqd8zegioo9it3srma5');
define('AUTH_SALT',        'ho3fyqby84wezkismibdb8jr8qauhugk9dfyeiselp6ndo8vj4un8tnfwqmjeu73');
define('SECURE_AUTH_SALT', 'dqrnhyx82kwobadajqnsmc8dr4uwe1xtvvumhx8sdh402obhuib2zcykpbaqsao6');
define('LOGGED_IN_SALT',   'ieoenyka3xqen2bovpjfa9lw9naznsiiajhzmivblguz9yp7ztygxpl3qvrc87de');
define('NONCE_SALT',       'ng0iwksyfgc07lvdlwaqu9ethdldghzovms6ve7qowrhzls5mtcwokizbh1kz29z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpmx_';

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
if (!defined('WP_DEBUG')) {
    define('WP_DEBUG', false);
}

/* Multisite */
// if (!defined('WP_ALLOW_MULTISITE')) {
//     define( 'WP_ALLOW_MULTISITE', true );
// }

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
