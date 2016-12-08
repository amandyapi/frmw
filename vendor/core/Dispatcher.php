<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dispatcher{
    
    public $request;
            
    function __construct() {
        
        $this->request = new Request();
        Router::parse($this->request->url,$this->request);
        $controller = $this->loadController();
        $action = $this->request->action;
        if($this->request->prefix){
            $action = $this->request->prefix.'_'.$action;
        }
        if(!in_array($action, array_diff(get_class_methods($controller),  get_class_methods('Controller')))){
            $this->error('Le controller '.$this->request->controller.' n\'a pas de méthode '.$action);
        }
        call_user_func_array(array($controller,$action), $this->request->params);
        //ob_start();
       $controller->render($action);
       //ob_end_flush();
    }
    
    function error($title){
        $controller = new Controller($this->request);
        $controller->Session = new Session();
        $controller->e404($title);
    }
    
    
    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'src'.DS.Conf::$bundle['default'].DS.'controller'.DS.$name.'.php';
        
        if(!file_exists($file)){
            $this->error('Le contenu demandé est indisponible');
            return false;
        }else{
            require $file;
        }
        $controller =  new $name($this->request);
        
        return $controller;
    }
}