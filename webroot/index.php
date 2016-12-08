<?php
//debug($_SERVER);

$debut = microtime(true);//true permet de retourner un chiffre
        // put your code here
define('WEBROOT',dirname(__FILE__) );
define('ROOT',dirname(WEBROOT) );
define('DS',dirname(DIRECTORY_SEPARATOR) );
define('CORE',ROOT.DS.'vendor'.DS.'core' );
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])) );
//put the all the config directories on constants
require CORE.DS.'includes.php';

new Dispatcher();


