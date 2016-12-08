<?php


class MembreController extends Controller{
    
    public $layout = 'smart';
    /**
	/**
     * Verifier attribut
     */
	
	function verifierexistancepseudo($pseudo){
			$this->loadModel('Membre');
			$membre = $this->Membre->findFirst(array(
                    'conditions' => array('pseudo' => $pseudo)
                )); 
				if(!empty($membre)){
					echo "find";
                }else{
					echo "empty";
                }
		
		die();
	}
	
	
	function verifierexistancepassword($password){
		
			$this->loadModel('Membre');
			$password = sha1($password);
			$membre = $this->Membre->findFirst(array(
                    'conditions' => array('passmbre' => $password)
                )); 
				if(!empty($membre)){
					echo "find";
                }else{
					echo "empty";
                }
		
		die();
	}
	
	
	/**
	/**
     * Login ajax
     */
	
	function loginajax($pseudo, $password){
				$this->loadModel('Membre');
                $password = sha1($password);
				//$membre = $this->Membre->find();
				
                $membre = $this->Membre->findFirst(array(
                    'conditions' => array('pseudo' => $pseudo,'passmbre' => $password)
                )); 
				 //debug($membre);
                  //     die();
                if(!empty($membre)){
					$membre->message = '';
                    $this->Session->write('Membre', $membre);
					echo "find";
					//echo $this->Session->read('Membre')->pseudo;
                   //$this->redirect('dashboard');
                }else{
					echo "empty";
                    //$this->Session->setFlash("Vos identifiants (nom d'utilisateur/mot de passe) sont incorrects");
                    //$this->redirect('pages/index');
                }
				die();
	}
    
    /**
     * Login 
     */
    
    function login() {
        //die();
        if($this->request->data){
            if(!empty($_POST['pseudo']) && !empty($_POST['passmbre'])){
                
            	
            $find = true;
            $findong = true;
            $membre = null;
            $adhesion = null;
            $pays = null;
            //debug($this->request->data);
            if(isset($_POST['sl'])){
				if(empty($this->request->req->lnk)){
					$this->loadModel('Membre','smart');
					$data = $this->request->data;
					$data->passmbre = sha1($data->passmbre);
					$membre = $this->Membre->findFirst(array(
						'conditions' => array('pseudo' => $data->pseudo,'passmbre' => $data->passmbre)
					));
					 //debug($membre);
					  //     die();
					if(!empty($membre)){
						//$find = true;
						$membre->message = '';
						$this->Session->write('Membre', $membre);
						//$this->redirect('dashboard');
					}else{
						$find = false;
						//$this->Session->setFlash("Vos identifiants (nom d'utilisateur/mot de passe) sont incorrects");
						//$this->redirect('pages/index');
					}
					$this->request->data->passmbre = '';
				}
			}
            else{
                //debug($_SESSION);die();
				if(!empty($this->request->req->lnk)){
					//$this->redirect('pages/index');
				}else{
                    $this->loadModel('Membre','mondenouveau1');
                    $this->loadModel('Adhesion','mondenouveau1');
                    $this->loadModel('Listpays','mondenouveau1');
					$this->loadModel('Cotisation','mondenouveau1');
                    //debug($this->request->data);
                    
                    $adhesion = $this->Adhesion->findFirst(array(
                     'conditions' => array('numadhesion' => $this->request->data->pseudo,'passadhesion' => $this->request->data->passmbre)
                     ));
                    if(!empty($adhesion)){
                        //$find = true;
                        //$findong = true;
                        $membreong = $this->Membre->findFirst(array(
                       'conditions' => array('idmbre' => $adhesion->adhesionbre)
                      ));
					  
					  //recuperation de la cotisation
					  $cotisation = $this->Cotisation->last(array(
                       'conditions' => array('cotimbre' => $adhesion->adhesionbre)
                      ),'idcoti');
					  //debug($cotisation); 
					  //echo'cotisation'.$cotisation->cotimbre ;
                     // die();
                         $pays = $this->Listpays->findFirst(array(
                     'conditions' => array('idpays' => $membreong->pays)
                     ));
                    //  debug($this->Membre);
					$membreong->finvalid = $cotisation->fin_valid;
                     $adhesion->adhesionbre = $membreong;    
                     $membreong->pays = $pays;
                      //debug($membreong);
                       //die();
                     unset($this->Membre);
                     unset($this->Adhesion);
                     unset($this->Listpays);
					 unset($this->Cotisation);
                    // debug($this->Membre);
                     //debug($adhesion);
                     $this->loadModel('Membre','smart');
                     $this->loadModel('Pays');
                     $this->loadModel('Compte');
                     $membre = $this->Membre->findFirst(array(
                       'conditions' => array('ong' => $adhesion->numadhesion)
                      ));
					  //$idparrain = $this->rechercher('Membre',array('lien' => $this->request->req->lnk))->id;
                        if(!empty($membre)){
                           // debug($membre);
                           //Le membre de l'ong est déjà inscrit, on enregistre sa session et on le redirige vers son dashboard 
						   $membre->message = '';
                        }
                        else{
							$idparrain = $this->request->data->parrain;
                            $membre = $this->createong($adhesion,$idparrain);
							$idmembre = $this->recherche('Membre','pseudo',$membre->pseudo)->id;                           
                            $membre->id = $idmembre;
                        }
                    }
                    else{
                        $find = false;
                        $findong = false;
                        
                    }
		}
            }
            
            if($find){
                $this->Session->write('Membre', $membre);
                $this->Session->setFlash("Bienvenue","success");
                if(isset($_SESSION['lnk'])){
                     unset($_SESSION['lnk']);
                 }
                if($findong){
                   $this->Session->write('Adhesion', $adhesion); 
                }
                $this->redirect('dashboard');
            }
            else{
                $this->Session->setFlash("Vos identifiants (nom d'utilisateur/mot de passe) sont incorrects","danger");
                if(!$findong){
                   header("Location: http://localhost:8080/frmw/?lnk=".$this->Session->read('lnk'));
                }
                else{
                    $this->redirect('pages/index');
                }
                
            }
            }
            else{
                if(!empty($this->Session->read('lnk'))){
                    header("Location: http://localhost:8080/frmw/?lnk=".$this->Session->read('lnk'));
                }
                else{
                    $this->redirect('pages/index');
                }
                
            }
        }
    }
    
    
    /**
     * Logout
     */
    
    function logout(){
       // debug($_SESSION);
	session_destroy();
        session_start();
        $this->Session->setFlash('Vous êtes déconnecté(e)','success');
        $this->redirect('pages/index');
    }
    
    
    function verifierabonnement($id){
		$this->loadModel('Membre');
		$this->loadModel('Abonnement');
		
		
	}



 
    function verifierpseudounique($name, $value) {
        $unique = null;
        //$name = $this->request->req->name;
        //$value = $this->request->req->value;
        $this->loadModel('Membre');
        $result = $this->Membre->findFirst(array(
                    'conditions' => array($name => $value)
                ));
        if(!empty($result)){
		   $unique = "existe";
        }else{
            $unique = "unique";
        } 
        echo $unique;
        die();
        //return $unique;
    }
    
    function verifieremailunique($name, $value) {
        $unique = false;
        //$name = $this->request->req->name;
        //$value = $this->request->req->value;
        $this->loadModel('Membre');
        $result = $this->Membre->findFirst(array(
                    'conditions' => array($name => $value)
                ));
        if(!empty($result)){
		   $unique = "existe";
        }else{
            $unique = "unique";
        } 
        echo $unique;
        die();
       // return $unique;
    }
    


    
    /**
     * envoyer le lien à un ami
     */
    
    
    function envoyerlien() {
                if($this->request->data){
           $this->request->data->friend_mail;
            $this->request->data->lien_parrainage;
            $this->request->data->user_message;
              // Pour les champs $noreply/ $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $noreply= 'noreply@smarts-life.com';
            $objet = "Smarts-life.com: Lien d'affiliation"; // Objet du message
            $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
            $headers .= 'Reply-To: '. $noreply."\n"; // Mail de reponse
            $headers .= 'From: "SMARTS-LIFE.COM"<'. $noreply.'>'."\n"; // Expediteur
            $headers .= 'Delivered-to: '.$this->request->data->friend_mail."\n"; // Destinataire

            $message = '<div style="width: 100%; text-align: center; font-weight: bold">
            <p><img style="width: 100px" src="https://www.smarts-life.com/sl//webroot/profile/images/logo.png"/></p>
            <p>'.$this->request->data->user_message.'<br/>
            <p><a href="'.$this->request->data->lien_parrainage.'"style="color:#32c5d2">Cliquez ici pour vous inscrire</a></p>
            </div>';
			$x = " ";
			$new_message = 
			'<div style="width: 100%; text-align: center; font-weight: bold">
            <p align="left"><img style="width: 100px" src="https://www.smarts-life.com/sl//webroot/profile/images/logo-smartslife.png"/></p>
			
			<p align="left">Bonjour M/Mme,<br>M./Mme '.$this->Session->read('Membre')->nommembre.' '.$this->Session->read('Membre')->pnommbre.' 
			vous invite à vous inscrire sur smarts-life.com via le lien d affiliation ci-dessous.<br> 
			Cordialement.
			</p>
			
            <p align="left">'.$this->request->data->user_message.'<br/>
            <p><a href="'.$this->request->data->lien_parrainage.'"style="color:#32c5d2">Cliquez ici pour vous inscrire</a></p>
            </div>';
			
			
			$new_message2 = 
			"<div style='width: 100%; text-align: center; font-weight: bold;margin:auto;'>
            <p align='left'><img style='width: 100px' src='https://www.smarts-life.com/sl//webroot/profile/images/logo-smartslife.png'/></p>
			
			<p align='left'>Bonjour M/Mme,<br>M./Mme ".$this->Session->read('Membre')->nommembre." ".$this->Session->read('Membre')->pnommbre." 
			vous invite à vous inscrire sur smarts-life.com via le lien d'affiliation ci-dessous.<br> 
			Cordialement.
			</p>
			
            <p align='left'>".$this->request->data->user_message."<br/>
            <p><a href='".$this->request->data->lien_parrainage."'style='color:#32c5d2'>Cliquez ici pour vous inscrire</a></p>
            </div>";
			
			
            if (mail($this->request->data->friend_mail, $objet, $new_message2, $headers))  return true; else return false;
			//$title = 'ok';
			//$this->set('title',$title);
			//$this->render('membre/dashboard');
        }
         
		//header('location:https://www.smarts-life.com/sl/dashboard');
    }
    
    
    
    
    
    /**
     * Changer le mot de passe
     */
    
    function changerpassword() {        
        if($this->request->data){            
        $this->loadModel('Membre');
        $this->request->data->passconf = sha1($this->request->data->passconf);
        $data = $this->request->data;
        $idmembre = $this->Session->read('Membre')->id;
        $membre = $this->Membre->findFirst(array(
               'conditions' => array('id' => $idmembre)
           ));
        echo 'Merci1';
        $membre->passmbre = $data->passconf; 
        //debug($membre);
            //die();
        $this->Membre->update($membre);
        $this->redirect('dashboard');
       }   
    }
    /**
     * Restauration du mot de passe
     */
    
    function restorepassword() {
        if($this->request->data){            
        $this->loadModel('Membre');
        $data = $this->request->data;
        $membre = $this->Membre->findFirst(array(
                'conditions' => array('pseudo' => $data->pseudo,'emailmembre' => $data->emailmembre)
            ));
            //debug($membre);
            //die();
            if(!empty($membre)){
                //generation du password
				$x = rand(500,10000);
                $pass = SHA1(($membre->id*100)+$x);
				
                $pass = substr($pass,0,10);
				
                $membre->passmbre = SHA1($pass);
				
                $this->Membre->update($membre);
				
                // Pour les champs $noreply/ $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
                $noreply= 'noreply@smarts-life.com';
                $objet = 'Smarts-life.com: Restauration du mot de passe'; // Objet du message
                $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
                $headers .= 'Reply-To: '. $noreply."\n"; // Mail de reponse
                $headers .= 'From: "WWW.SMARTS-LIFE.COM"<'. $noreply.'>'."\n"; // Expediteur
                $headers .= 'Delivered-to: '.$membre->emailmembre."\n"; // Destinataire

                $message = '<div style="width: 100%; text-align: center; font-weight: bold">
                <p><img style="width: 100px" src="https://smarts-life.com/sl/webroot/profile/images/logo.png"/></p>
                <p>    Bonjour M./Mme, recevez à travers ce courriel votre nouveau mot de passe qui le suivant: '.$pass.' .<br/> Vous pouvez le modifier après connexion.</p>
                <p><a href="https://smarts-life.com/sl/"style="color:#32c5d2">Cliquez ici pour retourner sur Smarts-life.com</a></p>
                </div>';
                if (mail($membre->emailmembre, $objet, $message, $headers))  return true; else return false;  
            				
            }
           //$this->redirect('pages/index');
        }
    }    
    
    
    
    
    
    /**
     * Compte
     */
    
    function compte($pseudo) {
         $this->loadModel('Membre');
         $d['membre'] = $this->Membre->findFirst(array(
               'conditions' => array('pseudo' => $pseudo)
           ));
         //$d['page']->NAME = 'Compte';
         $this->set($d);
    }
    
    
    
    
    
    
    /**
     * 
     */
   
    function index($pseudo) {
        //$perPage = 10;
         $this->loadModel('Membre');
         $d['membre'] = $this->Membre->findFirst(array(
               'conditions' => array('pseudo' => $pseudo)
           ));
         
         $d['membre']->parrain = $this->recherche('Membre','parrain',$d['membre']->parrain)->pseudo;
         $d['membre']->contrat = $this->recherche('Contrat','id',$d['membre']->contrat)->nom;
         $d['membre']->pays = $this->recherche('Pays','id',$d['membre']->pays)->nom;
         //$d['page']->NAME = 'Profil';
         $this->set($d);
    }
    
    
    
    
    function dashboard() {
        if(isset($_SESSION['lnk'])){
        unset($_SESSION['lnk']);
        }
	$this->layout = 'smart_dashboard';
	$this->loadModel('Membre','smart');
	//$this->loadModel('Contrat');
	$this->loadModel('Pays');
	//$this->loadModel('Grade');
	//$this->loadModel('Pack');
        $this->loadModel('Compte');
	$d['pays'] = $this->Pays->find();
	$d['membre'] = $this->Membre->findFirst(array(
		'conditions' => array('id' => $this->Session->read('Membre')->id)
	)); 
                                   
	 $parrain = $this->recherche('Membre','id',$d['membre']->parrain);
         $d['membre']->parrain = $parrain->pseudo;
	 $d['membre']->photoparrain = $parrain->photombre;
	 $d['membre']->pays = $this->recherche('Pays','id',$d['membre']->pays)->langFR;
	 $d['membre']->fieuls = $this->rechercheMultiple('Membre','parrain',$d['membre']->id);
	 $d['membre']->compteprincipal = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'compte principal'));
	 $d['membre']->cash = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'cash'));
	 $d['membre']->crowfounding = $this->rechercher('Compte',array('membre' => $d['membre']->id,'type'=>'crow founding'));
	 $membre = $d['membre'];
	 $this->Session->write('Membre', $membre);
	 $requesturi = $_SERVER['REQUEST_URI'];
	 $querystring = $_SERVER['QUERY_STRING'];
	 $servername = $_SERVER['SERVER_NAME'];
				 
	 $d['site'] = new stdClass();
	 $d['site']->httpreferer = $_SERVER['SERVER_NAME'].preg_replace('#'.$querystring.'#', '', $requesturi);
	 $d['page'] = new stdClass();
	 $d['page']->name = 'Dashboard';	 
	 $this->set($d);
            				
    }
    
     /**
     * Historique du compte cash
     */
    
    function histocash() {
         $this->layout = 'smart_dashboard';
         $this->loadModel('Membre');
         $this->loadModel('Compte');
         $this->loadModel('Depot');
         $this->loadModel('Retrait');
         
         $membre = $this->rechercher('Membre',array('id' => $this->Session->read('Membre')->id));
         $compte = $this->rechercher('Compte',array('membre' => $membre->id,'type' => 'cash'));
         $d['compte'] = $compte;
         $d['depots'] = $this->rechercheMultiple('Depot','compte',$compte->id);
         
         $d['retraits'] = $this->rechercheMultiple('Retrait','compte',$compte->id);
         $d['page'] = new stdClass();
         $d['page']->name = 'Historique cash';
         
         $this->set($d);
    }
    /**
     * Formulaire de la demande de retrait
     */
    
    function formdmdretait() {
       $this->layout = 'smart_dashboard';  
    } 
    /**
     * Traitement du formulaire de demande
     */
    
    function dmdeffectue() {
       $this->layout = 'smart_dashboard';  
       $this->loadModel('Demandretrait');
       $this->request->data->datdemand = date('Y-m-d h:i:s');
       $this->request->data->membre = $this->Session->read('Membre')->id;
	   $this->request->data->membre = 'attente';
       $this->Demandretrait->add($this->request->data);
	   $this->redirect('dashboard');
    } 
    
    
    
    
    /**
     * Historique du compte principal
     */
    
    function histocp() {
         $this->layout = 'smart_dashboard';
         $this->loadModel('Membre');
         $this->loadModel('Compte');
         $this->loadModel('Depot');
         $this->loadModel('Retrait');
         
         $membre = $this->rechercher('Membre',array('id' => $this->Session->read('Membre')->id));
         $compte = $this->rechercher('Compte',array('membre' => $membre->id,'type' => 'compte principal'));
         
         $d['depots'] = $this->rechercher('Depot',array('compte' => $compte->id));
         
         $d['retraits'] = $this->rechercher('Retrait',array('compte' => $compte->id));
         
         $this->set($d);
    }
    
    
    
    
    /**
     * Historique du compte crow founding
     */
    
    function histocf() {
         $this->layout = 'smart_dashboard';
         $this->loadModel('Membre');
         $this->loadModel('Compte');
         $this->loadModel('Depot');
         $this->loadModel('Projet');
         $this->loadModel('Investissement');
         $this->loadModel('Retrait');
         
         $membre = $this->rechercher('Membre',array('id' => $this->Session->read('Membre')->id));
         
         $d['investissements'] = $this->Investissement->find(array(
               'conditions' => array('membre' => $membre->id)
           ));
         
           foreach ($d['investissements'] as $key => $value) {
               $value->membre = $membre;
               $value->projet = $this->rechercher('Projet',array('id' => $value->projet));
           }
           $d['nbrivestissement'] = 0;
           $d['nbrivestissement'] = count($d['investissements']);
         
         //debug($d['investissements']);
         //die();
         
         //$projet = $this->rechercher('Projet',array('membre' => $membre->id,'type' => 'crow founding'));
         
         $d['page'] = new stdClass();
         $d['page']->name = 'Historique Crow founding';
         $this->set($d);
    }
    
    
    
    
    
    
    /**
     * Permet d'editer un membre
     */
    
    function edit($id = null) {
        $this->loadModel('Membre');
        $this->loadModel('Pays');
        $this->loadModel('Contrat');
        $d['id'] = '';
       // $this->request->data->parrain = $this->recherche('Membre','pseudo',$this->request->data->parrain)->id;
        $d['pays'] = $this->Pays->find();
        if($this->request->data){
            $this->request->data->parrain = $this->recherche('Membre','pseudo',$this->Session->read('Membre')->pseudo)->parrain;
            $this->request->data->contrat = $this->recherche('Contrat','nom',$this->request->data->contrat)->id;
            $destinationphoto = '';
            //Enregistrer la 
            $tab = explode('.', $this->request->file->photombre['name']);
            if(!empty($this->request->file->photombre['name'])){
                $destinationphoto ='uploads/profile/'.$this->request->data->pseudo.'.'.$tab[1];
                $this->request->data->photombre = $this->request->data->pseudo.'.'.$tab[1];
                $this->Membre->upload($this->request->file->photombre['tmp_name'],$destinationphoto);
            }else{
                 $this->request->data->photombre = $this->recherche('Membre','pseudo',$this->Session->read('Membre')->pseudo)->photombre;
            }
            //debug($this->request->data);
           // die();
            $this->Membre->update($this->request->data);
            $this->redirect('dashboard');
            $this->Session->setFlash('Vos informations ont bien été mises à jour.');
            $id = $this->Membre->id;
        }
        
        if($id){
        }
       $this->set($d);
    }
    
    /**
     * Permet de créer un article
     */
    
    function create() {
         if($this->request->data){
             $this->loadModel('Membre','smart');
             $this->loadModel('Compte');
                   $this->loadModel('Pays');
             if(!empty($this->request->data->parrain)){
                 $find_parrain = null;$find_pseudo=null;$find_emailmembre=null;
                 $parrain_mbre = $this->request->data->parrain;
                 $find_parrain = $this->rechercher('Membre',array('parrain' => $parrain_mbre));
                 $find_pseudo = $this->rechercher('Membre',array('pseudo' => $find_pseudo));
                 $find_emailmembre = $this->rechercher('Membre',array('emailmembre' => $find_emailmembre));
                
                if(!empty($find_parrain) && empty($find_pseudo) && !empty($find_emailmembre)){
                   $this->request->data->passmbre = sha1($this->request->data->passmbre);
                   $this->request->data->dateadhesion = date('Y-m-d h:i:s');
                   $code = $this->rechercher('Pays',array('id' => $this->request->data->pays))->alpha2;
                   $this->request->data->lien = $code.sha1($this->request->data->pseudo.$this->request->data->dateadhesion);//codepays.hash(pseudo.date('Y-m-d h:i:s'))
                   $this->request->data->parrain = $this->recherche('Membre','pseudo',$this->request->data->parrain)->id;
                   $this->request->data->contrat = 1;
                   unset($this->request->data->passmbreconfirm);
                   unset($this->request->data->link);
                   $this->request->data->etat = 'inscrit';
                   $this->request->data->ong = '';
                   $this->request->data->finvalid = '0000-00-00';
                   $this->Membre->add($this->request->data); //Vérifier si l'ajout a été effectué correctement....
                   $idmembre = $this->recherche('Membre','pseudo',$this->request->data->pseudo)->id;
                   $this->compteInit($idmembre);
                   $this->request->data->id = $idmembre;
                   $this->request->data->message = ', Bienvenue à smarts-life! Nous vous remercions pour votre inscription';
                   $this->Session->write('Membre', $this->request->data);//
                   $this->Session->setFlash('Votre compte a bien été créé');
                   $this->redirect('dashboard');
                }
                else{
                    header("Location: http://localhost:8080/frmw/?lnk=".$this->Session->read('lnk'));
                }
                   
             }
             else{
                 header("Location: http://localhost:8080/frmw/?lnk=".$this->Session->read('lnk'));
             }
				
		 }
    }
	function createong($adhesion, $idparrain) {
          $membre = new stdClass();
          $membre->pays = $this->recherche('Pays','alpha2',$adhesion->adhesionbre->pays->codepays)->id;
          $membre->nommembre = $adhesion->adhesionbre->nommbre;
          $membre->pseudo = $adhesion->numadhesion;
          $membre->pnommbre = $adhesion->adhesionbre->pnommbre;
          $membre->emailmembre = $adhesion->adhesionbre->emailmbre;
          $membre->passmbre = sha1($adhesion->adhesionbre->passmbre);
          $membre->genremembre = substr($adhesion->adhesionbre->sexe, 0, 1);
          $membre->dnaiss = $adhesion->adhesionbre->dnaissmbre;
	  $membre->finvalid = $adhesion->adhesionbre->finvalid;//ici finvalid
          $membre->ville = ucfirst(strtolower($adhesion->adhesionbre->lieuhabit));
          $membre->phonemembre = $adhesion->adhesionbre->telmbr;
          $membre->photombre = "default.png";
          $membre->dateadhesion = date('Y-m-d h:i:s');      
          $code = $this->recherche('Pays','alpha2',$adhesion->adhesionbre->pays->codepays)->alpha2;
          $membre->lien = $code.sha1($membre->pseudo.$membre->dateadhesion);//codepays.hash(pseudo.date('Y-m-d h:i:s'))
          $membre->parrain = $idparrain;
          $membre->contrat = null;
          $membre->grade = null;
          $membre->zipcode = null;
          $membre->descriptionperso = null;
          $membre->etat = 'inscrit';
          //Selection de la dernière cotisation 
          		                   
          $membre->ong = $adhesion->numadhesion;
          //debug($membre); 
          //die();		  
          $this->Membre->add($membre); //Vérifier si l'ajout a été effectué correctement....
            
          try{
               //$idmembre = $this->recherche('Membre','pseudo',$membre->pseudo)->id;
               $search = $this->Membre->findFirst(array(
                    'conditions' => array('dateadhesion' => $membre->dateadhesion)
                ));
               $idmembre = $search->id;
               //debug($search->id);
               //$this->compteInit($idmembre); 
               //$this->loadModel('Compte');
                $solde = array('type'=> 'compte principal','solde'=> 0,
                        'membre'=> $idmembre, 'pack'=> NULL);
                $cash = array('type'=> 'cash','solde'=> 0,
                        'membre'=> $idmembre, 'pack'=> NULL);
                $cf = array('type'=> 'crow founding','solde'=> 0,
                        'membre'=> $idmembre, 'pack'=> NULL);
                $this->Compte->add($solde); 
                $this->Compte->add($cash); 
                $this->Compte->add($cf);
          }
         catch(PDOException $e){
             echo $e->getMessage();
             die();
         }
          $membre->message = ', Bienvenue à smarts-life! Nous vous remercions pour votre inscription';
           return $membre;
    }
	
    function paiementapi() {
        
        return true;
    }
	
    function indexBitcoin () { 
	ini_set('session.cookie_domain', 'www.smarts-life.com');
	session_start();
	$this->loadModel('Membre');
	$d['membre'] = $this->Membre->findFirst(array(
               'conditions' => array('id' => $this->Session->read('Membre')->id)
           ));
//debug($d['membre']);

$_SESSION['client']['id'] = $d['membre']->id; 
$_SESSION['client']['pseudo'] = $d['membre']->pseudo; 

$_SESSION['client']['etat'] = $d['membre']->etat; 
$_SESSION['client']['ong'] = $d['membre']->ong; 
$_SESSION['client']['emailmembre'] = $d['membre']->emailmembre; 
$_SESSION['client']['genremembre'] = $d['membre']->genremembre; 
$_SESSION['client']['nommembre'] = $d['membre']->nommembre; 
$_SESSION['client']['pnommbre'] = $d['membre']->pnommbre; 
$_SESSION['client']['photombre'] = $d['membre']->photombre; 
 //http://smarts-life.com/bitchange/?page=buybitcoin
header ( 'location: ../bitchange/?page=buybitcoin' ); 
//header ( 'location:https://smarts-life.com/bitchange/?page=buybitcoin' );
}
    
    function abonnement() {
         $this->loadModel('Membre');
         $this->loadModel('Compte');
         
         //etat=inscrit?
         $pseudo = $this->Session->read('Membre')->pseudo;
         $etat = $this->recherche('Membre','pseudo',$pseudo)->etat;
         
         if($this->Membre->paiementapi()){
             /*
             * GESTION DES COMMISSIONS
             */
            if($etat = 'inscrit'){
                $idparrain1 = $this->request->data->parrain;
                $idparrain2 = $this->recherche('Membre','parrain',$idparrain1)->id;
                $idparrain3 = $this->recherche('Membre','parrain',$idparrain2)->id;
                $idparrain4 = $this->recherche('Membre','parrain',$idparrain3)->id;
            }
         }
    }
    
    function compteInit($id) {
        $this->loadModel('Membre');
        $solde = array('type'=> 'compte principal','solde'=> 0,
                'membre'=> $id, 'pack'=> NULL);
        $cash = array('type'=> 'cash','solde'=> 0,
                'membre'=> $id, 'pack'=> NULL);
        $cf = array('type'=> 'crow founding','solde'=> 0,
                'membre'=> $id, 'pack'=> NULL);
        $this->Compte->add($solde); 
        $this->Compte->add($cash); 
        $this->Compte->add($cf); 
    }
    /**
     * Permet de supprimer un article
     */
    
    function admin_delete($id) {
        $this->loadModel('User');
        $this->User->delete($id);
        $this->Session->setFlash('L\'utilisateur a bien été supprimé');
        $this->redirect('admin/users/index');
    }
   
}