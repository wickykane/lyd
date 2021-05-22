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
define('AUTH_KEY',         'PB9K+n7qhRw/tGp2c9eiAWNur7OIc9WE/hLcb5eSKhOHPA5mCAQoGVfADWpLgNbTitd1obNwy5lszgWmMpPP0A==');
define('SECURE_AUTH_KEY',  'gkNsybPDJZ2CdzdUodeyrbRRNpaK9G7e8BrAR283YhHpxhVDjsMP+gw3+95+gO0Rm/7WtkzclIj8lgR1nMPDzw==');
define('LOGGED_IN_KEY',    'nwrPg+JczRN4N/MgmomAqJwb6lKJYpYYOjLJs2Wry9zpnDRx81BwP9Wk504SAtn/AIfDboZmnOR6vFc/tzVPgQ==');
define('NONCE_KEY',        'MNU4EP8IqZl6SOJJGwUjF44F4YJp6+YWzz7nZN0BSejLFfvffrp8qh5YayQjoemlJYZdczSeAcO01B2PXJBJlA==');
define('AUTH_SALT',        '0eOuFaAGCQe/o7E4Pa+Lr+T4XtCtJEGsJgtvvx9ctMteTCqt2M/uNfpJPKqf+mGgghTWZYyFfeWmCOmJYk0CWQ==');
define('SECURE_AUTH_SALT', '8JODyPyiHL0WlhNqVwQhVmmCRktWwma1IdPiGotYy0U2SHMTBnGRBd1qWS59Q00QiE1fNGpfi3IJoVuWfrCFAA==');
define('LOGGED_IN_SALT',   'Ej5oSrRCwRaCiYEN2K/cFN27E7M9kf9YYS1Zo8zkLOYBW4lMcXtiQces42t46YorssWw96EQaJC29WAPc7L9AQ==');
define('NONCE_SALT',       'XEz4c47piHdi83yWbjfnSki7Y8jfNbWunOkp5gBIgQ90oMjqOZcgNhUW1NaAzVQmPIeM7Op1H5GLQlYczPVrBw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
