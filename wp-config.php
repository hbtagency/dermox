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
define('DB_NAME', 'dermox');
//define('DB_NAME', 'Dermox_Staging');

/** MySQL database username */
define('DB_USER', 'root');
//define('DB_USER', 'b93dbee0f2cd6b');

/** MySQL database password */
define('DB_PASSWORD', '123');
//define('DB_PASSWORD', '173a37b0');

/** MySQL hostname */
define('DB_HOST', 'localhost');
//define('DB_HOST','ap-cdbr-azure-southeast-b.cloudapp.net');
//define('DB_HOST','mysql://b93dbee0f2cd6b:173a37b0@ap-cdbr-azure-southeast-b.cloudapp.net/Dermox_Staging');


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
define('AUTH_KEY',         '%(J;>9YsFV7+m~Li%+7xc77Y-V]4byB yT!FT5dz-NQ:7A}a-MS|B`>uEk]Xplo9');
define('SECURE_AUTH_KEY',  'oP-<:kS,YXYZE3VL=U)F:n6[c1><:b+<L8|p+!n8IPhOW.lRxf> kLeQ/O7;JF.>');
define('LOGGED_IN_KEY',    '-;F/-G!/2fXr)Faw0?@7y%<8ym2([PpL;q)&bP[hf[s,|;gOgR=b3Yn;bgTr^wdr');
define('NONCE_KEY',        '#p7)a@Net6;:)5YIJtwH/s5aj@)@*-e7B]3`>&63_KP9w4Iay|;`tZy)>_/nqEXz');
define('AUTH_SALT',        'IUT{Z<j 7#S[hQ:PpQ:5.**KF||$|+6hM,iEpb56+jo]dTU0SaOyp-%@evp-<ef5');
define('SECURE_AUTH_SALT', 'U-Qv]L@n.Bf!&Qrxx{~EsisKa5fQme|uW-|]HwZ;N`*yJL5|QOKhg3hQ4v$_!-sd');
define('LOGGED_IN_SALT',   'Y`gn:7AO.!l6w!rLHtn-6`%`-M1<Bj1ggo_g];f&@8]6c|}84-_63$S?[aFa@^x+');
define('NONCE_SALT',       'Egu.JJ)N-<lhI_|1!+wH-]knROM(-PVy@SKAQwe}g#UKfX[Huux~sa#AA2tu(<S3');

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
define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
