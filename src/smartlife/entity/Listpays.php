<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Listpays extends ListpaysManager{
    
    /**
     * 
     * 
     */
  
    public $conf;
    
    public function __construct($conf = 'smart') {
        $this->conf = $conf;
        parent::__construct();
    }
   
}
