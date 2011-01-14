<?php

date_default_timezone_set('Europe/London');
mb_internal_encoding('utf-8');

// Autoload paths
define('ROOT_DIR',       $_SERVER['ROOT_DIR']);

// Web app
define('APP_DIR',        ROOT_DIR . '/app');
define('CONF_DIR',       APP_DIR  . '/conf');
define('CONTROLLER_DIR', APP_DIR  . '/controller');
define('EMAIL_DIR',      APP_DIR  . '/email');
define('LIB_DIR',        APP_DIR  . '/lib');
define('SERVICE_DIR',    APP_DIR  . '/service');
define('TEMPLATE_DIR',   APP_DIR  . '/template');

// 3rd party libs
define('VENDOR_DIR',     ROOT_DIR . '/vendor');

set_include_path(
    get_include_path() . PATH_SEPARATOR
    . CONF_DIR         . PATH_SEPARATOR
    . SERVICE_DIR      . PATH_SEPARATOR
    . LIB_DIR          . PATH_SEPARATOR
    . VENDOR_DIR       . PATH_SEPARATOR
);
spl_autoload_extensions('.class.php');
spl_autoload_register(function ($class) {
    return spl_autoload(str_replace('\\', '/', $class));
});

register_shutdown_function(array('Core\Dump', 'flush'));

require_once('util.php');
require_once('conf.php');
require_once(gethostname() . '.conf.php');
require_once(APP_DIR . '/init.php');