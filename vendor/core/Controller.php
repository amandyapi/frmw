<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller{
    
    public $request;
    private $vars = array();
    public $layout = 'smart';
    private $rendered = false;
    public $bundle;
            
    function __construct($request = null) {
        ini_set('session.cookie_domain', 'www.smarts-life.com');
        $this->Session = new Session();
        $this->bundle = Conf::$bundle['default'];
        $this->Form = new Form($this);
        
        if($request){
            $this->request = $request;
            require ROOT.DS.'app'.DS.'config'.DS.'hook.php';
        }
        
    }
    
    public function render($view) {
        if($this->rendered){return false;}
        extract($this->vars);
       
       if(strpos($view,'/')===0){
           $view = ROOT.DS.'src'.DS.$this->bundle.DS.'view'.$view.'.php';
       }else{
           $view = ROOT.DS.'src'.DS.$this->bundle.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
       }
       
       
       ob_start();
       require($view);
       $content_for_layout = ob_get_clean();
              
       require ROOT.DS.'app'.DS.'layout'.DS.$this->layout.'.php';
       
       $this->rendered = true;
    }
    
    public function set($key,$value = null){
        
        if(is_array($key)){
            $this->vars += $key;
        }
        else{
            $this->vars[$key] = $value;
        }
    }
    
    /**
     * 
     */
    
    
    public function loadEntity($name,$config) {
        $file = ROOT.DS.'src'.DS.$this->bundle.DS.'entity'.DS.$name.'.php';
        require_once $file;
        if(!isset($this->$name)){
            $this->$name = new $name($config);
        } else {
            echo 'Entity pas chargée';
        }
        
        
        
    }
    public function loadEntityManager($name) {
        $entityManager = ROOT.DS.'src'.DS.$this->bundle.DS.'entity'.DS.$name.'Manager.php';
        require_once $entityManager;
        
    }
    
    
    public function loadModel($name,$conf='remote2') {
        $entityManager = ROOT.DS.'src'.DS.$this->bundle.DS.'entity'.DS.$name.'Manager.php';
        require_once $entityManager;
        $this->loadEntity($name,$conf);
        
    }
    
    /**
     * Permet de gérer les erreurs 404
     */
    
    public function e404($title) {
        header("HTTP/1.0 404 Not Found");
        $this->set('title',$title);
        //$this->set('message',$message);
        $this->render('/errors/404');
         die();
    }
    
    /**
     * Permet d'appeller un controlleur depuis une vue
     */
    
    public function request($controller, $action) {
        $controller.='Controller';
        require_once ROOT.DS.'src'.DS.$this->bundle.'controller'.DS.$controller.'.php';
        
        $c = new $controller();
        
        return $c->$action();
    }
    /**
     * redirect
     */
    function redirect($url, $code = null) {
        if($code == 301){
            header("HTTPS/1.0 301 Moved Permanently");
        }
        header("Location: ".Router::url($url));
    }
    
    /**
     * Rechercher une entité
     * A mettre dans le manager
     */
    
    function recherche($entity, $searchattr, $valattr) {
        if($entity != $entity){
            $this->loadModel($entity);
        }
        $result = $this->$entity->findFirst(array(
            'conditions'=>array($searchattr => $valattr)
                ));
        return $result;
    }
    
    
    /**
     * Recherche multiple
     * Retourne un tableau d'entités
     */
    
    function rechercheMultiple($entity, $searchattr, $valattr) {
        if($entity != $entity){
            $this->loadModel($entity);
        }
        $result = $this->$entity->find(array(
            'conditions'=>array(strtolower($searchattr) => $valattr)
                ));
        return $result;
    }
    
    
    
    /**
     * Rechercher
     * Retourne une entité
     */
    
    function rechercher($entity, $conditions, $multiple = false) {
        if($entity != $entity){
            $this->loadModel($entity);
        }
        
        if(!$multiple){
            $result = $this->$entity->findFirst(array(
            'conditions'=>$conditions
                ));
        }
        else{
              $result = $this->$entity->find(array(
            'conditions'=>$conditions
                ));
        }
        return $result;
    }
}