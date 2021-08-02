<?php

define('ENVIRONMENT', 'development');

/**
 * Reporting d'erreurs
 * Source:grafikart.com
 */

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/**
 * Conf. des URL
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

/**
 * Conf. de la BDD
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'db.3wa.io');
define('DB_NAME', 'emersontho_tigf');
define('DB_USER', 'emersontho');
define('DB_PASS', 'ba791dc42aa76d5f7dab14f84cba497e');
define('DB_CHARSET', 'utf8');