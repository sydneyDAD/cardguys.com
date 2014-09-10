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


 
//$json = file_get_contents('http://ipinfo.io/'.$_SERVER['REMOTE_ADDR']);
//$details = json_decode($json);
//$country = $details->country;


if ($country=='CA'){

    define('DB_NAME', 'oscar497_cardguys_usa_blog');

 }
 else{
    //echo "USA";
   define('DB_NAME', 'oscar497_cardguys_usa_blog');

    
 }



// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

/** MySQL database username */
define('DB_USER', 'oscar497_root');

/** MySQL database password */
define('DB_PASSWORD', 'dad123');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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

/* Substitute in built apliances */
define('AUTH_KEY',         'e18202a6b2340576849d1d8cd6f44c13cdd42e010462cfb8422cab576324603d');
define('SECURE_AUTH_KEY',  '376840af25e6ad3407559a338fc134981c2bdfe72fad6f82b41db45f1b4ecdc5');
define('LOGGED_IN_KEY',    'feee47f194e33175ef08fa918cc7fd677499624dde6da697551fe7fbc08e38ce');
define('NONCE_KEY',        '7213ab9e6049831986485e2ca9d96952b4156eb73ed3bea48c096de9cd71be6b');
define('AUTH_SALT',        'ea057e7804f9b71ac141c0530c3e60be0c403a4239c8a56e6b6b480a5ce6c3cd');
define('SECURE_AUTH_SALT', 'a9cd2c82d9f518c86336bcd79be598712326536b9947d2f65c621bf7cb2c51f1');
define('LOGGED_IN_SALT',   'b35a1ae9827570de459f0ed1787d91b809783f2c08ccf27a6dfe8a6c7c1db093');
define('NONCE_SALT',       'd12cc757f46a0ec5423b2b6cfa8cd7a403bfe29e2884fb90163902f319da3646');

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
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/





/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

//define('WP_TEMP_DIR', '/Applications/XAMPP/xamppfiles/apps/wordpress/tmp');

