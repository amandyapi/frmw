<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PicsManager
 *
 * @author akass
 */
class PicsManager {
    //put your code here
    
    public function __construct() {
        
    }
    
    public static function savepicture($fichier, $destination) {
        //$this->request->file
        $nom_fichier = $fichier['name'];
        move_uploaded_file($nom_fichier, $destination);
        return true;
    }
}
