<?php

// function __autoload($class) {
//     include 'classes/' . $class . '.class.php';
//     include ROOT.DS.'src'.DS.Conf::bundle['default'].DS.'model'.DS. $class .'.php';
// }

/*function model_autoloader($class) {
    include ROOT.DS.'src'.DS.Conf::$bundle['default'].DS.'entity'.DS. $class .'.php';
}*/

function core_autoloader($class) {
    //include 'classes/' . $class . '.class.php';
    include CORE.DS. $class .'.php';
}

//spl_autoload_register('model_autoloader');
spl_autoload_register('core_autoloader');
//Create and register other functions;
// Ou, en utilisant une fonction anonyme à partir de PHP 5.3.0
/*
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});*/