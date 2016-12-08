<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Membre extends MembreManager{
    
    /**
     * 
     * 
     */
    public $conf;
    
    public function __construct($conf = 'smart') {
        $this->conf = $conf;
        parent::__construct();
    }
    
    public $validate = array(
        'NAME' => array( 
            'rule' => 'notEmpty', 
            'message' => 'Vous devez préciser un titre'
            ),
        'SLUG' => array( 
            'rule' => '([a-z0-9\-]+)', 
            'message' => "L'url n'est pas valide"
            )
    );
    
    public function upload($fichier,$destination){
        
        move_uploaded_file($fichier, $destination);
    }
    
    
    public function paiementapi() {
        
        return true;
    }
   
}
