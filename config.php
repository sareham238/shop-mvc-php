<?php
/**
 * Address App Config
 */
$urlname = "http://localhost/shop/";
$site = "/shop/";
$css_folder = "public/css/";
$js_folder = "public/js/";
$images_folder = "uploads/images/";
$sitename="پروژه سواد کوهی :)";

/**
 * Database Config
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_shop');
define('DB_USER', 'root');
define('DB_PASS', '');
define("URL", $urlname);
define("SITE", $site);
define("URL_CSS", $css_folder);
define("URL_JS", $js_folder);
define("URL_IMAGE", $images_folder);
define("SITE_NAME", $sitename);

/**
 * HASH
 */
define('KEY_PASSWORD', 'savad96');
define('ALGO_PASSWORD', 'MD5');
