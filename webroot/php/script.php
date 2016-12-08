<?php require('bdd.php'); 

function payabonnement()
{   //ini_set('session.cookie_domain', 'www.smarts-life.com');
	session_start(); 
	//Récupération de l'identifiant du client en variable de Session
	//$_SESSION['id']= $this->Session->read('Membre')->pseudo;
	//Montant de l'abonnement évalué à 60000francs CFA
	$_SESSION['price']=20000*1.055;
	//$_SESSION['price']=10*1.055; 
	//Duree l'abonnemen fixée à 12mois
	//$_SESSION['duree']=12;
	//Description du paiement
	$_SESSION['desc']='Paiement abonnement';
	if($_SESSION['ong']!=''){	  
	  $now = new DateTime();
	  $now = $now->format(’Ymd’);
	  $finvalid = $_SESSION['Membre']->finvalid;
	  $finvalid = new DateTime( $finvalid );
	  $finvalid = $finvalid->format(’Ymd’);
	  if($finvalid >= $now){
	  $_SESSION['price']=15000*1.055 ;
	   //$_SESSION['price']=5*1.055; 	
	   }
	}
	echo 'ok';
    die();	
}

?>