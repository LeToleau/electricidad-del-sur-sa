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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c49273OMK+1uCbFETObvYSaVVVB3KrtlL6+bKB1RDNwfCb9jEzxPvyEmPRBUBQ3bB2OtltIY39nWezeQ8fsCqg==');
define('SECURE_AUTH_KEY',  'V8cuWQZjMETvgcWnHdsTRe86gibdAWiNgFtu9P+Oo+YpG8jSgo+ikhvsZSnaS5/3KP4JM/1GbYC+WzoRShcVGg==');
define('LOGGED_IN_KEY',    'OQV9hOpXfGhI+tBx4A6sWxBMZbmimlfTrslb5PwTcTrbdtGh6EBhDSZ0CeIp1zy4nOefWCUS0G2c+4ACucos5Q==');
define('NONCE_KEY',        'v8fIWitOhyW4PE7VZr4C/ys3AJu2O2sgH0tfyEUjPenxRO5Xd1u9HicmPGvKOZG+kVNH507/gNkoaQL1s1bvUg==');
define('AUTH_SALT',        '6LL/NaxZDOawx+bTDmqWID+qaWacG3xHVzs/K/BceLkezlYbuzxQe5sD8KHmkxg0FU8+5JGz4eblSznrKVzJMw==');
define('SECURE_AUTH_SALT', 'GlIzUy8OH4rlX2wizq22L0HGUZhPMxMxjR+Nkk5Vx0vhlJdVm4gEG4KpNVdoqlMBWIRwr/FuuUVCcKIbnwHVpA==');
define('LOGGED_IN_SALT',   'sZTXaKs+IEV2KQJ6ALKk7XEVzc6xRbd/9CDPsWOAo/JHTD5B+ZLTMpOmpTSLj8T4cUqk5PS0RrCKPsxO0RYulg==');
define('NONCE_SALT',       'dAYJiCr7W4mWv6NEt8rI9S3ce0a5WkciBOUVeXeSPG7A6h3c9H2a/4QVOe9JhyK2Q/8wN/r3qmGeuRP6iLaVSA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
ini_set('display_errors','On');
ini_set('error_reporting', E_ALL );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
