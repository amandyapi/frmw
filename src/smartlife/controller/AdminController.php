<?php


class AdminController extends Controller{
    
    public $layout = 'smart_admin';
    
    
    /**
     * Login
     */
    
    function login() {
        $this->layout = 'smart_admin_login';
        if($this->request->data){
           //debug($this->request->data);
           $data = $this->request->data;
           $data->pass = sha1($data->pass);
           $this->loadModel('Admin');
           $admin = $this->Admin->findFirst(array(
               'conditions' => array('nom' => $data->nom,'pass' => $data->pass)
           ));
           //die();
           if(!empty($admin)){
               $this->Session->write('Admin', $admin);
               $this->redirect('admin/dashboard');
               //echo 'trouvé';
           }else{
               $this->Session->setFlash('Vos identifiants (nom d\'utilisateur/mot de passe) sont incorrects');
               $this->redirect('admin/login');
           }
           
           $this->request->data->pass = '';
           
           
        }
    }
    
    /**
     * Logout
     */
    
    function logout(){
        unset($_SESSION['Admin']);
        $this->Session->setFlash('Vous êtes maintenant déconnecté');
        $this->redirect('admin/login');
    }
    
    function dashboard() {
        
    }
    
    function membresIndex() {
        $this->loadModel('Membre','smart');
        $this->loadModel('Pays');
        $d['membres'] = $this->Membre->find();
        foreach ($d['membres'] as $key => $value) {
               $value->pays = $this->rechercher('Pays',array('id' => $value->pays))->langFR;
           }
        $this->set($d);
        //$this->render('$view');
    }
    
    function demandeRetraitIndex() {
        $this->loadModel('Membre');
        $this->loadModel('Compte');
        $this->loadModel('Demandretrait');
        $d['demandretrait'] = $this->Demandretrait->find();
        //debug($d['membres']);
        //die();
        foreach ($d['demandretrait'] as $key => $value) {
               $d['membre'] = new stdClass();
               $d['membre']->cash = $this->rechercher('Compte',array('membre' => $value->membre,'type'=>'cash'))->solde; 
               $d['membre']->id = $value->membre;
               // $d['membre'] = $this->Compte->findFirst(array('conditions' => array('membre' => $value->membre,'type'=>'cash') ))->solde;
                $value->membre = $this->rechercher('Membre',array('id' => $value->membre))->pseudo;
               //debug($d['membre']);
               //die();
           }
        
        $this->set($d);
        //$this->render('$view');
    } 
	function abonnementManuel($id) {
        $this->loadModel('Paiementab');
        $this->loadModel('Abonnement');
        $this->loadModel('Comptesl');
        $this->loadModel('Membre');
        $this->loadModel('Compte');
        $this->loadModel('Depot');
        $this->loadModel('Retrait');
        $this->loadModel('Histocompte');
        //insertion dans la table paiementab
        $paiementab  = new stdClass();
        $paiementab->id_transaction = '';
        $membre = $this->Membre->findFirst(array('conditions' => array('id' => $id)));
        $paiementab->montant = 20000;
        if($membre->ong!=''){
		  $now = new DateTime();
	      $now = $now->format(’Ymd’);
	      $finvalid = $membre->finvalid;
	      $finvalid = new DateTime( $finvalid );
	      $finvalid = $finvalid->format(’Ymd’);
	      if($finvalid >= $now){
	       $paiementab->montant = 15000;  	
	      }           
        }	
        $paiementab->devise = 'F.CFA';
        $paiementab->site_id = '';
        $paiementab->langue = 'FR';
        $paiementab->version = '';
        $paiementab->payment_config = '';
        $paiementab->page_action = '';
        $paiementab->infopayeur = $id;
        $paiementab->payment_method = 'Espece';
        $paiementab->signature = '';
        $paiementab->cel_phone_num = '';
        $paiementab->phone_prefixe = '';
        $paiementab->resultat = 00;
        $paiementab->trans_status = 'ACCEPTED';
        $paiementab->designation = 'Abonnemnt smarts-life';
        $paiementab->dat = date('Y-m-d h:i:s');
        $this->Paiementab->add($paiementab);
        //insertion dans la table abonnement
        $abonnement  = new stdClass();
        $abonnement->membre = $id;
        $abonnement->datab = $paiementab->dat;
        $abonnement->montant = $paiementab->montant; 
        $abonnement->solde = $paiementab->montant;  
        $abonnement->ptcom = 0.1; 
        $this->Abonnement->add($abonnement);          
        //Recuperation de lastinsertid
          $idabon = $this->Abonnement->findMax(null,'id');
          $abonnement = $this->Abonnement->findFirst(array('conditions' => array('id' => $idabon)));
          //calcul du solde
          $solde = $this->Abonnement->findSum(null,'montant');
          // mise ajour du solde         
          $abonnement->solde = $solde;           
          $this->Abonnement->update($abonnement);
//          //calcul du solde des retrait
         $solderetrait = $this->Retrait->findSum(null,'montant');
         if($solderetrait==NULL) $solderetrait =0;
//         echo 'merci retrait'.$solderetrait;
//         die();
          //Mise à jour dans la table comptesl
          $soldeab = $solde;
          $soldecomcash = $soldeab*$abonnement->ptcom;
          $soldecomcash = $soldecomcash-$solderetrait;
          $soldetva = $soldeab*0.18;
          $capitalsl = $soldeab - ($soldecomcash+$soldetva);
          $comptesl  = new stdClass();
          $comptesl->soldeab = $soldeab;
          $comptesl->soldecomcash = $soldecomcash;
          $comptesl->soldetva = $soldetva;
          $comptesl->capitalsl = $capitalsl;
          $comptesl->dat = date('Y-m-d h:i:s');
          $this->Comptesl->add($comptesl);
          //Mise à jour de l'etat du membre dans la table membre(l'etat devient abonner)
          $membre->etat = 'abonner';
          $this->Membre->update($membre);
          //Selection du compte cash du parrain
          $comptecashparrain = $this->Compte->findFirst(array('conditions' => array('membre' => $membre->parrain,'type' =>'cash')));
          //insertion dans histocompte de la valeur du compte car il va subir une modification
          $histocompte  = new stdClass();
          $histocompte->compte = $comptecashparrain->id;
          $histocompte->montant = $comptecashparrain->solde;
          $histocompte->datchgt = date('Y-m-d h:i:s');
          $this->Histocompte->add($histocompte);
          //on fait un depot dans la table depot qui sera ensuite ajouter au solde du compte cash du parrain
	     $commission = $abonnement->montant*$abonnement->ptcom;
         $observation = "Versement de la commission de parrainage";
         $depot  = new stdClass();
         $depot->montant  = $commission;
         $depot->datdepot  = date('Y-m-d h:i:s');
         $depot->observation   = $observation ;
         $depot->compte  = $comptecashparrain->id;
         $this->Depot->add($depot);
         //Mise à jour du compte cash du parrain
        $comptecashparrain->solde = $comptecashparrain->solde + $depot->montant;
        $this->Compte->update($comptecashparrain);
//        echo 'merci solde'.$this->Abonnement->findSum(null,'montant');
//        echo 'merci abon'.$this->Abonnement->findMax(null,'id');
//        die();
    }
    function demandeValider($id) {
        $this->loadModel('Membre');
        $this->loadModel('Compte');
        $this->loadModel('Histocompte');
        $this->loadModel('Retrait');
        $this->loadModel('Demandretrait');
        $demandretrait = $this->Demandretrait->findFirst(array('conditions' => array('id' => $id)));
        $compte = $this->rechercher('Compte',array('membre' => $demandretrait->membre,'type'=>'cash'));
        if($demandretrait->etat != 'terminer' && $compte->solde >=$demandretrait->montant){
        $retrait = new stdClass();
        $retrait->montant = $demandretrait->montant;
        $retrait->datretrait = date('Y-m-d h:i:s');
        $retrait->observation = 'Le numero de transfert est '.$demandretrait->numero.' id de la demande est '.$demandretrait->id;
        
        $retrait->compte = $compte->id;
        $this->Retrait->add($retrait);
        //On enregistre l'ancien solde dans histocompe
        $histocompte  = new stdClass();
        $histocompte->compte = $compte->id; 
        $histocompte->montant = $compte->solde;
        $histocompte->datchgt = $retrait->datretrait;
        $this->Histocompte->add($histocompte);
        //enlever le montant dans le solde du compte cash
        $compte->solde = $compte->solde - $demandretrait->montant;
        $this->Compte->update($compte);
        //On change l'etat de la demande
        $demandretrait->etat = 'terminer';
        $this->Demandretrait->update($demandretrait);
        }  
        //$this->demandeRetraitIndex();
//        return true;
    }
	
    function membresShow($id) {//Rajouter les projets sur lesquels le membre a fait des investissements
         $this->loadModel('Membre','smart');
         $this->loadModel('Pays');
         $this->loadModel('Contrat');
         $this->loadModel('Grade');
         $this->loadModel('Pack');
         $this->loadModel('Compte');
         $d['membre'] = $this->Membre->findFirst(array('conditions' => array('id' => $id) ));
         $parrain = $this->recherche('Membre','id',$d['membre']->parrain);
         $d['membre']->photoparrain = $parrain->photombre;
         $d['membre']->parrain = $parrain->pseudo;
         $d['membre']->contrat = $this->recherche('Contrat','id',$d['membre']->contrat)->nom;
         $d['membre']->pays = $this->recherche('Pays','id',$d['membre']->pays)->langFR;
         $d['membre']->infograde = $this->recherche('Grade','id',$d['membre']->grade)->description;
         $d['membre']->fieuls = $this->rechercheMultiple('Membre','parrain',$d['membre']->id);
         $d['membre']->compteprincipal = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'compte principal'));
         $d['membre']->cash = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'cash'));
         $d['membre']->crowfounding = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'crow founding'));
         //debug($d);
         //die();
        $this->set($d);
    }
	
	//function abonnementManuel($id) {//Rajouter les projets sur lesquels le membre a fait des investissements
         /* $this->loadModel('Membre');
         $this->loadModel('Pays');
         $this->loadModel('Contrat');
         $this->loadModel('Grade');
         $this->loadModel('Pack');
         $this->loadModel('Compte');
		 
		 die();
		 
         $d['membre'] = $this->Membre->findFirst(array('conditions' => array('id' => $id) ));
         $parrain = $this->recherche('Membre','id',$d['membre']->parrain);
         $d['membre']->photoparrain = $parrain->photombre;
         $d['membre']->parrain = $parrain->pseudo;
         $d['membre']->contrat = $this->recherche('Contrat','id',$d['membre']->contrat)->nom;
         $d['membre']->pays = $this->recherche('Pays','id',$d['membre']->pays)->langFR;
         $d['membre']->infograde = $this->recherche('Grade','id',$d['membre']->grade)->description;
         $d['membre']->fieuls = $this->rechercheMultiple('Membre','parrain',$d['membre']->id);
         $d['membre']->compteprincipal = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'compte principal'));
         $d['membre']->cash = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'cash'));
         $d['membre']->crowfounding = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'crow founding'));
         //debug($d);
         //die();
        $this->set($d); */
   // }
    
    
    function membresDelete($id) {
        $this->loadModel('Membre');
        $this->Membre->delete($id);
        $this->redirect('membres_index');
        return true;
    }
    
    
    function membresEtat($id,$etat) {
        $this->loadModel('Membre');
        $data = array('id' =>$id, 'etat'=>$etat);
        $this->Membre->update($data);
        $this->redirect('membres_index');
    }
    
    
}