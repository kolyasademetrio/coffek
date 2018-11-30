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
define('DB_NAME', 'coffeposcomua');

/** MySQL database username */
define('DB_USER', 'coffeposcomua');

/** MySQL database password */
define('DB_PASSWORD', 'QbtFp7o6');

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
define('AUTH_KEY',         'qysgviylqlssqvq3dvpo8vqh7dsomsthzwmxrdzd4qcjggyxbk9jplpiokyz9w1b');
define('SECURE_AUTH_KEY',  'mo3vf42kg9huoxzbikackmd0gyo9jfg8u8ugglekxgqaebjzyawjoxsjj9eaymef');
define('LOGGED_IN_KEY',    '2xu0wmqhf30e2en4hjwzwbtzdcf3cnmtboizm3ehtdnpyhwcxp3q1i7itzo7c0bt');
define('NONCE_KEY',        'eopseuzsnqkghqrmsuvkpth8sqnmhr64gv4c0d4scdnkyml39qsx9hlsln91eino');
define('AUTH_SALT',        'kgwqmspnuslt1uosf9n2iyuqljmefaq4g7gq4wdwp0teerxtflbrvw8g0ukfn0um');
define('SECURE_AUTH_SALT', 'prpdwbte2niourn6m75wyqa8u5dursmhmmj7irx1tqgwicnm9l3tpo6jua3hyguy');
define('LOGGED_IN_SALT',   'auyxtwy2zsarcz8hqvmhjfdaqcxvq8nvg2duxvlekrv4btzmrsfeqhxn8hwdyrrp');
define('NONCE_SALT',       'syzwuqfwjettdtb9yiisdjshcdx8gmaribjzhuxbdw3cltltvo6efqwxhzbnmvub');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpni_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');



define( 'WPCACHEHOME', '<site root>/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
