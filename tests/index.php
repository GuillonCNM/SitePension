<?php 
 
// déclaration de la constante d'environnement
defined('APPLICATION_ENV') ||
    define('APPLICATION_ENV', getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing');

defined('ROOT_PATH') || 
    define('ROOT_PATH', dirname(dirname(__FILE__)));

defined('APPLICATION_PATH') || 
    define('APPLICATION_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'application');	

defined('CONFIG_PATH') || 
    define('CONFIG_PATH', APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs');
     
    
set_include_path(
    get_include_path() . 
    PATH_SEPARATOR .
    APPLICATION_PATH . 
    PATH_SEPARATOR . 
    ROOT_PATH . DIRECTORY_SEPARATOR . 'library'
);

require_once 'Zend/Application.php';
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

Zend_Session::$_unitTestEnabled = true;










