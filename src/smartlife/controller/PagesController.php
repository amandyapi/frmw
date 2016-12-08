<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PagesController extends Controller{
    
    public $layout = 'smart';
    
    /**
     * Page d'accueil du site
     */
    function index() {
       // debug($_SESSION);
            $this->loadModel('Pays');
            $d['pays'] = $this->Pays->find();
            $d['parrain'] = null;
        if($this->request->req){
	    session_destroy();
            session_start();
            $this->Session->write('lnk', $this->request->req->lnk);
            $this->loadModel('Membre','smart');
	    $d['parrain'] = new stdClass();
            $d['parrain']->pseudo = $this->rechercher('Membre',array('lien' => $this->request->req->lnk))->pseudo;
            $d['parrain']->id = $this->rechercher('Membre',array('lien' => $this->request->req->lnk))->id;
        }else{
            if(isset($_SESSION['lnk'])){
                     unset($_SESSION['lnk']);
                 }
            $d['parrain'] = new stdClass();
            $d['parrain']->pseudo = 'test';
            $d['parrain']->id = 12;
        }
        $this->Session->write('Parrain', $d['parrain']);
        $d['page'] = new stdClass();
        $d['page']->NAME = 'Accueil';
        $this->set($d);
    }
   
    
    
    
    
     
    
    /**
     * Page de contact
     */
    function opportunite() {
            $d['page'] = new stdClass();
            $d['page']->name = 'Opportunités';
            $d['page']->content = 'Contenu en cours de rédaction...';
        
        $this->set($d);
    }
    
    
    
    
    
    /**
     * Page de contact
     */
    function contact() {
            $d['page'] = new stdClass();
            $d['page']->name = 'contact';
            $d['page']->content = 'Contenu en cours de rédaction...';
        
        $this->set($d);
    }
    
    function profil($pseudo) {
        //$perPage = 10;
        $this->layout = 'smart_dashboard';
         $this->loadModel('Membre');
         $d['membre'] = $this->Membre->findFirst(array(
               'conditions' => array('pseudo' => $pseudo)
           ));
         //$d['page']->NAME = 'Profil';
         $this->set($d);
    }
    
    function services() {
        $this->loadModel('Post');
        $d['page'] = $this->Post->findFirst(array(
            'conditions'=>array('ONLINE' => 1,'SLUG'=>'services')
                ));
       
        $this->set($d);
    }
    
    /**
     * 
     * @param type $slug
     */
    
    function view($slug){
        $this->loadModel('Post');
        $d['page'] = $this->Post->findFirst(array(
            'conditions'=>array('ONLINE' => 1,'SLUG'=>$slug,'TYPE'=>'page')
                ));
       
        if(empty($d['page'])){
            $this->e404('Page introuvable','La page à laquelle vous voulez acceder n\'existe pas');
        }
        
        $this->set($d);
    }
    /**
     * Permet de récupérer les pages pour le menu
     */
    function getMenu() {
        $this->loadModel('Post');
        return $this->Post->find(array(
            'conditions' => array('ONLINE' => 1, 'TYPE' => 'page')
        ));
    }
    
    /**
     * ADMIN
     */
   
    function admin_index() {
        $perPage = 10;
         $this->loadModel('Post');
         $condition = array('TYPE'=>'page');
         $d['posts'] = $this->Post->find(array(
             'fields'=>'ID,NAME,ONLINE',
            'conditions'=> $condition,
             'limit'=> ($perPage*($this->request->page-1)).','.$perPage
                ));
         $d['total'] = $this->Post->findCount($condition);
         $d['page'] = ceil($d['total']/$perPage);
         $this->set($d);
    }
    
    /**
     * Permet d'editer une page
     */
    
    function admin_edit($id = null) {
        $this->loadModel('Post');
        $d['id'] = '';
        if($this->request->data){
            //debug($this->request->data);
            //$this->Post->save($this->request->data);
                $this->Post->update($this->request->data);
                $this->Session->setFlash('Le contenu a bien été modifié');
                $id = $this->Post->id;
             
        }
        
        if($id){
            $this->request->data = $this->Post->findFirst(array(
            'conditions'=> array('ID'=> $id)
          ));
            $d['id'] = $id;
        }
        //debug($this->request->data);
       // debug($_POST);
       $this->set($d);
    }
    
    /**
     * Permet de créer un article
     */
    
    function admin_create() {
        
        if($this->request->data){
            $this->loadModel('Post');
            $this->request->data->USER_ID = 1;
            $this->request->data->TYPE = 'page';
            $this->request->data->CREATED = date('Y-m-d h:i:s');
            $this->Post->add($this->request->data);
            $this->Session->setFlash('Le contenu a bien été ajouté');
            
            //debug($this->request->data);
            //$this->redirect("admin/posts/index");
        }
        
        //debug($this->request->data);
       // debug($_POST);
        
    }
    
    /**
     * Permet de supprimer un article
     */
    
    function admin_delete($id) {
        $this->loadModel('Post');
        $this->Post->delete($id);
        $this->Session->setFlash('Le contenu a bien été supprimé');
        $this->redirect('admin/pages/index');
    }
    
     
    /**
     * Liste de tous les projets disponibles sur la platforme
     */
    
    public function projets() {
        $this->layout = 'smart_dashboard';
        $this->loadModel('Projet');
        
        $d['projets'] = null;
        $d['projets'] = $this->Projet->find(array(
               'conditions' => array('etat' => 'actif')
           ));
         $d['page'] = new stdClass();
            $d['page']->name = 'Projets';
          // debug($d['projets']);
           //die();
        $this->set($d);
        return $d;
    }
    
	
	
	
	/**
     * Liste de tous les projets disponibles sur la platforme
     */
     public function  cgusmartlife() {
	 $this->layout = 'smart';
       
         $d['page'] = new stdClass();
         $d['page']->name = "cgusmartlife";
          // debug($d['projets']);
           //die();
        $this->set($d);
        return $d;
	 }
    public function conditionsutilisation() {
        $this->layout = 'smart';
       
         $d['page'] = new stdClass();
         $d['page']->name = "Conditions d'utilisation";
          // debug($d['projets']);
           //die();
        $this->set($d);
        return $d;
    }
    
	
	
    public function ajax() {
        //echo 'Ajax request ok';
        die('Ajax request ok');
        //return true;
    }
}