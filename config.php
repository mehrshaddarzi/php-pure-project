<?php

// Get ABSPATH
define('ABSPATH', getcwd());

/**
 ** Turn on debug mode
 ** This will display all the PHP errors and warnings
 **/
define('WP_DEBUG', false);

/** The name of the database for WordPress */
define('DB_NAME', 'project.com');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

// Prefix Database Table
define('DB_PREFIX', 'pr_');

// Load Database
require_once 'db.php';

// Autoload
require_once 'library/autoload.php';