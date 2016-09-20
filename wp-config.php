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
define('DB_NAME', 'busanlife');

/** MySQL database username */
define('DB_USER', 'englishseed2');

/** MySQL database password */
define('DB_PASSWORD', 'englishseed2');

/** MySQL hostname */
define('DB_HOST', 'englishseed2.czrngnw3nlel.ap-northeast-2.rds.amazonaws.com:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

// added by KH
define('DISABLE_WP_CRON', true);

// added by KH
define('DISALLOW_FILE_EDIT', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_m,q3dY9!Gzq]|A|RwD=b~(;#h08w>;-vQ? 7$0,[3WPzjo_r-nMsYK2C=G]IGj,');
define('SECURE_AUTH_KEY',  '0kfa>KHUq(V#$c5k|NO@X04-/d/@%Ztf+_-LAirW&f`[`i_9JhqMhA|+-^opKohj');
define('LOGGED_IN_KEY',    'PQ<uJo=-2[d*+nX:hAIBC+W=_#qu@EoY#P`9ud}Yx~<sq=qE1%7W/+O5QPAvX=Ja');
define('NONCE_KEY',        '4zr}s-RG(mdy-#YnAw(.rBOuT{@q[,)R71qLCAFj >{|wkU|0hz:|~jPQM}Hb?Dq');
define('AUTH_SALT',        'h-HkO)6 ?zI9Q<{=n/+$ _*?eob5bp-=*1a|^#GoAB244H.U5D<i]Ng|EgL-@-VW');
define('SECURE_AUTH_SALT', '?|i KZrALLHuv!LVe0G+1~FrF{MqaoFTdh.@/[&1oM!T+ yzH4%f= lbEwZ%gLQV');
define('LOGGED_IN_SALT',   'Bb^(o7YN:{u$@e52@!_3jW0K]MQey|xy&tf>UHgGkA@sT5N)YpY 7XLV-U)ygFHH');
define('NONCE_SALT',       'CZJe9a*/UbeJspkB2[H@xT((X-e5+#W,/BN(3Q3*T?TBT.q9{$Qxe^I.pfuxkbba');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
