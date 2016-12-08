<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author akass
 */
class Session {
    //put your code here
    
    public function __construct() {
        if(!isset($_SESSION)){
            session_start();
        }
    }
    
    public function setFlash($message, $type = 'success') {
        $_SESSION['flash'] = array('message' => $message,'type'=>$type);
    }
    
    public static function flash() {
        if(!empty($_SESSION['flash']['message'])){
            $html = '<button type="button" class="btn btn-'.$_SESSION['flash']['type'].'">'.$_SESSION['flash']['message'].'</button>';
            $_SESSION['flash'] = array();
            return $html;
        }
    }
    
    public function write($key,$value) {
        $_SESSION[$key] = $value;
    }
    
    public function read($key = null) {
        if($key){
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];   
            }else{
                return false;
            }
        }else{
            return $_SESSION;
        }
    }
    
    
    
    public function isLogged() {
		
		//if(!empty($_SESSION['sauvegarde']) && empty($_SESSION['Membre'])){
		//	 $_SESSION['Membre'] = $_SESSION['sauvegarde'];
		//}
         return isset($_SESSION['Membre']);
    }
    
    
    
    
    public function user($key) {
       if($this->read('Membre')){
           if(isset($this->read('Membre')->$key)){
               return $this->read('Membre')->$key;
           }else{
               return false;
           }
       }
       
       return false;
    }
}
