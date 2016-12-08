<?php


class ServiceController extends Controller{
    
    public $layout = 'smart';
    
    function index() {
        $this->loadModel('Categorie');
        $this->loadModel('Service');
         $d['categories'] = $this->Categorie->find();
         foreach ($d['categories'] as $key => $value) {
             $d['categories'][$key]->services = null;
         $d['categories'][$key]->services = $this->Service->find(
                array('conditions' => array('categorie' => $value->id))
            );
         }
         $this->set($d);
    }
    
    
    function services($idcategorie) {
        $this->loadModel('Categorie');
        $this->loadModel('Service');
         $d['services'] = $this->Service->find(
         array(
               'conditions' => array('categorie' => $idcategorie)
         ));
         $d['categorie'] = $this->recherche('Categorie','id',$idcategorie)->libelle;
         $this->set($d);
    }
    
    function ficheservices($idservice) {
        $this->loadModel('Service');
        $this->loadModel('Membre');
        $this->loadModel('Categorie');
         $d['service'] = $this->Service->findFirst(
         array(
               'conditions' => array('id' => $idservice)
         ));
         
         $d['service']->membre = $this->recherche('Membre','id',$d['service']->membre);
         //$d['service']->membre = $d['service']->membre->nommembre.' '.$d['service']->membre->pnommbre;
         $d['service']->membre = $d['service']->membre->pseudo;
         
         $d['service']->categorie = $this->recherche('Categorie','id',$d['service']->categorie)->libelle;
         
         $this->set($d);
    }
    
    function commander($idservice) {
        /*
        if($this->request->data){
            $this->loadModel('Membre');
             //Vérification pseudoparrain et password membre à faire
            debug($this->request->data);
            $this->request->data->passmbre = sha1($this->request->data->passmbre);
            $this->request->data->dateadhesion = date('Y-m-d h:i:s');
            //$this->request->data->lien = md5($this->request->data->pseudo);
            $this->request->data->lien = 'smart?l='.$this->request->data->pseudo.date('YsmidhmiYs');
            //$this->request->data->pays = (int)$this->request->data->pays;
            $this->request->data->parrain = $this->recherche('Membre','pseudo',$this->request->data->parrain)->id;
            $this->request->data->contrat = 1;
             //Gestion de la photo
            //Gestion du Pack?
            unset($this->request->data->passmbreconfirm);
            $this->Membre->add($this->request->data); //Vérifier si l'ajout a été effectué correctement....
            //die();
            $this->Session->write('Membre', $this->request->data);//
               //echo 'trouvé';
            $this->Session->setFlash('Votre compte a bien été créé');
            $this->redirect('dashboard/'.$this->request->data->pseudo);
            }
            */
    }
    
    
    
}