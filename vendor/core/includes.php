<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'Session.php';

require 'Form.php';
require 'functions.php';
require 'Router.php';
require ROOT.DS.'app'.DS.'config'.DS.'conf.php';
require ROOT.DS.'app'.DS.'config'.DS.'routing.php';
require 'Request.php';

require 'Dispatcher.php';
require 'Controller.php';
require 'Manager.php';
include 'PicsManager.php';
//require ROOT.DS.'vendor'.DS.'autoload'.DS.'autoloader.php';PicsManager

include ROOT.DS.'vendor'.DS.'mailer/Mailer.php';