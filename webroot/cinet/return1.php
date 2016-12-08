<?php
session_start();
//require('../php/email.php');
require_once('CinetPay.php'); require('../php/bdd.php'); $bdd= bdd_connect();


try 
{
//    $apiKey = "18718161895693e92612ded7.33252263"; 
//    $site_id = "378245";
//    $plateform = "PROD";//Use PROD if you switch in Production
    $id_transaction=$_POST['cpm_trans_id'];  
    $montant=$_POST['cpm_amount'];
    $devise=$_POST['cpm_currency'];
    $site_id=$_POST['cpm_site_id'];
    $langue=$_POST['cpm_language'];
    $version=$_POST['cpm_version'];
    $payment_config=$_POST['cpm_payment_config'];
    $page_action=$_POST['cpm_page_action'];
    $infopayeur=$_POST['cpm_custom'];
    $payment_method=$_POST['payment_method'];
    $signature=$_POST['signature'];
    $cel_phone_num=$_POST['cel_phone_num'];
    $phone_prefixe=$_POST['cpm_phone_prefixe'];
    $resultat=(int)$_POST['cpm_result'];
    $trans_status=$_POST['cpm_trans_status'];
    $infopayeur=explode('|', $infopayeur);
    $idmbre=$infopayeur[0]; 
    $designation=$infopayeur[1];
	//$dat = date("YmdHis");
	//if($designation=='Paiement abonnement'){
    if($resultat==00 && $trans_status=='ACCEPTED'){
        
        	$query0= $bdd->prepare("SELECT * FROM paiementab WHERE id_transaction=:id_transaction");
        	$query0->execute(array('id_transaction'=>$id_transaction));
        	$cverif=$query0->rowCount();
            if($cverif!=0) {
                return false;
            }else
            {
				$query= $bdd->prepare("INSERT INTO paiementab VALUES(:id, :id_transaction, :montant, :devise, :site_id, :langue,
                                        :version, :payment_config, :page_action, :infopayeur, :payment_method, :signature, :cel_phone_num, :phone_prefixe, :resultat,
                                        :trans_status, :designation, now())");
                                
				if($query->execute( array( 'id'=>'', 'id_transaction'=>$id_transaction, 'montant'=>$montant, 'devise'=>'F CFA', 'site_id'=>$site_id, 'langue'=>$langue,
                                    'version'=>$version, 'payment_config'=>$payment_config, 'page_action'=>$page_action, 'infopayeur'=>$idmbre, 'payment_method'=>$payment_method,
                                    'signature'=>$signature, 'cel_phone_num'=>$cel_phone_num, 'phone_prefixe'=>$phone_prefixe, 'resultat'=>$resultat, 'trans_status'=>$trans_status,
                                    'designation'=>$designation)))
				{

                  echo 'paiementab reglé try';
				}else{
				  echo 'deja enregistrer';
			     }
		}
	}elseif($CinetPay->_cpm_trans_status=='REFUSED') header('location: ../?page=refused');

//}else{
//partie pour le retour du paiement de bitcoin
//}			
} catch(Exception $e)
{ 
	throw new Exception($e); 
}
echo 'paiementab reglé hors try';	
?>