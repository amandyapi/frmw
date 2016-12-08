<?php


class ProduitController extends Controller{
    
    public $layout = 'smart';
    
    function index() {
        $this->loadModel('Categorie');
        $this->loadModel('Produit');
         $d['produits'] = $this->Produit->find();
         $d['categories'] = $this->Categorie->find();
         $this->set($d);
    }
}