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

if ($_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1')
{
    /** The name of the database for WordPress */
    define('DB_NAME', 'myfood-site');

    /** MySQL database username */
    define('DB_USER', 'root');



    /** MySQL database password */
    $desk = $_ENV['REDIRECT_DESK'];

    if($desk == "alex")
        define('DB_PASSWORD', 'root');
    else
        define('DB_PASSWORD', '56dEbR!6$usP');


    /** MySQL hostname */
    if($desk == "alex")
        define('DB_HOST', 'localhost');
    else
        define('DB_HOST', '192.168.1.15:8889');


//    define ('WP_DEBUG', true);
//    define( 'WP_CACHE', false );


}
else if ($_SERVER['SERVER_ADDR'] == '217.160.235.90')
{
// ** MySQL settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define('DB_NAME', 'myfood-site');

    /** MySQL database username */
    define('DB_USER', 'myfood_usr');

    /** MySQL database password */
    define('DB_PASSWORD', '9.6pzuf6v64v');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');

    define ('WP_DEBUG', true);

    define( 'WP_CACHE', false );


} else {
    /** The name of the database for WordPress */
    define('DB_NAME', 'online_database_name_here');

    /** MySQL database username */
    define('DB_USER', 'online_username_here');

    /** MySQL database password */
    define('DB_PASSWORD', 'online_password_here');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');

    define('WP_DEBUG', false);

    define( 'WP_CACHE', true );

}

define('DB_COLLATE', '');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
