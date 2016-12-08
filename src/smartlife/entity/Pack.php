<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Pack extends PackManager{
    
    /**
     * 
     * 
     */
    
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
    
    
   
}
