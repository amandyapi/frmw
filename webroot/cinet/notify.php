<?php
session_start(); require_once('CinetPay.php'); require('../php/bdd.php'); $bdd= bdd_connect();

try 
{
    $id_transaction=$_POST['cpm_trans_id'];  $montant=$_POST['cpm_amount']; $descpay=$_POST['cpm_designation']; $devise=$_POST['cpm_currency'];
    $site_id=$_POST['cpm_site_id']; $langue=$_POST['cpm_language']; $version=$_POST['cpm_version']; $payment_config=$_POST['cpm_payment_config'];
    $page_action=$_POST['cpm_page_action']; $infopayeur=$_POST['cpm_custom']; $payment_method=$_POST['payment_method']; $signature=$_POST['signature'];
    $cel_phone_num=$_POST['cel_phone_num']; $phone_prefixe=$_POST['cpm_phone_prefixe']; $resultat=(int)$_POST['cpm_result']; $trans_status=$_POST['cpm_trans_status'];
    $infopayeur=explode('|', $infopayeur); $idmbre=$infopayeur[0]; $designation=$infopayeur[1]; $dat = date("YmdHis");
    
	if($designation=='Paiement abonnement' && $resultat==00 && $trans_status=='ACCEPTED' && $resultat==00 && $trans_status=='ACCEPTED')
	{
		$query0= $bdd->prepare("SELECT * FROM paiementab WHERE id_transaction=:id_transaction"); $query0->execute(array('id_transaction'=>$id_transaction)); $cverif=$query0->rowCount();
		if($cverif!=0) { return false;}
		else
		{                    //insertion dans la table paiementab
			$query= $bdd->prepare("INSERT INTO paiementab VALUES(:id, :id_transaction, :montant, :devise, :site_id, :langue, :version, :payment_config, :page_action, :infopayeur, :payment_method, :signature, :cel_phone_num, :phone_prefixe, :resultat, :trans_status, :designation, :dat)");
			if($query->execute( array( 'id'=>'', 'id_transaction'=>$id_transaction, 'montant'=>$montant, 'devise'=>'F CFA', 'site_id'=>$site_id, 'langue'=>$langue, 'version'=>$version, 'payment_config'=>$payment_config, 'page_action'=>$page_action, 'infopayeur'=>$idmbre, 'payment_method'=>$payment_method, 'signature'=>$signature, 'cel_phone_num'=>$cel_phone_num, 'phone_prefixe'=>$phone_prefixe, 'resultat'=>$resultat, 'trans_status'=>$trans_status, 'designation'=>$designation,'dat'=>$dat )))
			{   
			//insertion dans la table abonnement                                    
			$ptcom = 10/100;
			$query1= $bdd->prepare("INSERT INTO abonnement VALUES(:id, :membre, :datab, :montant, :solde, :ptcom)");
			$query1->execute( array( 'id'=>'', 'membre'=>$idmbre, 'datab'=>$dat, 'montant'=>$montant, 'solde'=>$montant, 'ptcom'=>$ptcom ));
			$id = $bdd->lastInsertId();
			echo 'abonnement reglé try';
			
			//SELECT dans la table abonnement pour faire la somme des montants enregistré
			$query2= $bdd->query("SELECT SUM(montant) FROM abonnement");$solde=$query2->fetch();
			echo  $solde[0];                                   
			$solde = $solde[0];
			//Mise à jour dans la table abonnement 
			$query3= $bdd->prepare('UPDATE abonnement SET  solde = :solde WHERE id = :id');
			$query3->bindValue(':solde', $solde);
			$query3->bindValue(':id', $id, PDO::PARAM_INT);
			$query3->execute();
			
			//Mise à jour dans la table comptesl
			$soldeab = $solde;
			$soldecomcash = $soldeab*$ptcom;
			$soldetva = $soldeab*0.18;
			$capitalsl = $soldeab - ($soldecomcash+$soldetva);
			$query9 = $bdd->prepare('INSERT INTO comptesl SET soldeab = :soldeab, soldecomcash = :soldecomcash, soldetva = :soldetva, capitalsl = :capitalsl');
			$query9->bindValue(':soldeab', $soldeab);
			$query9->bindValue(':soldecomcash', $soldecomcash);
			$query9->bindValue(':soldetva', $soldetva);
			$query9->bindValue(':capitalsl', $capitalsl);
			$query9->execute();
			echo 'solde abonné'.$soldeab.'<br>';
			echo 'solde commission cash'.$soldecomcash.'<br>';
			echo 'solde tva'.$soldetva.'<br>';
			echo 'capitalsl'.$capitalsl.'<br>';
			
			//Mise à jour de l'etat du membre dans la table membre(l'etat devient abonner)
			$query4= $bdd->prepare('UPDATE membre SET  etat = :etat WHERE id = :id');
			$query4->bindValue(':etat', 'abonner');
			$query4->bindValue(':id', $idmbre, PDO::PARAM_INT);
			$query4->execute();
			
			//Selection de l'id du parrain dans la table membre
			$query5= $bdd->query('SELECT parrain FROM membre WHERE id = '.(int) $idmbre);$idparrain=$query5->fetch();
			$idparrain = $idparrain[0]; 
			echo 'id du parrain'.$idparrain.'<br>';
			
			//Selection du compte cash du parrain
			$query6= $bdd->prepare('SELECT * FROM compte WHERE membre = :id AND type = :type');
			$query6->bindValue(':type', 'cash');
			$query6->bindValue(':id', $idparrain, PDO::PARAM_INT);
			$query6->execute(); $cptparrain=$query6->fetch();
			echo 'id du compte cash du parrain'.$cptparrain[0].'<br>';
			
			//on fait un depot dans la table depot qui sera ensuite ajouter au solde du compte cash du parrain
		   $commission = $ptcom*$montant;
		   
			$observation = "Versement de la commission de parrainage";
			$query7 = $bdd->prepare('INSERT INTO depot SET montant = :montant, datdepot = :datdepot, observation = :observation, compte = :compte');
			$query7->bindValue(':montant', $commission);
			$query7->bindValue(':datdepot', $dat);
			$query7->bindValue(':observation', $observation);
			$query7->bindValue(':compte', $cptparrain[0], PDO::PARAM_INT);
			$query7->execute();
			 echo 'commission du parrain'.$commission.'<br>';
			 //Mise à jour du compte cash du parrain
			 $soldecash = $cptparrain[2]+$commission;
			 $query8= $bdd->prepare('UPDATE compte SET  solde = :solde WHERE id = :id');
			 $query8->bindValue(':solde', $soldecash);
			 $query8->bindValue(':id', $cptparrain[0], PDO::PARAM_INT);
			 $query8->execute();
			 echo 'Solde du compte cash du parrain'.$soldecash.'<br>';
			  include('email.php');	} else{echo 'deja enregistrer';} }
	}elseif($designation=='ACHAT BTC' && $resultat==00 && $trans_status=='ACCEPTED' && $resultat==00 && $trans_status=='ACCEPTED'){
	$query=$bdd->prepare("SELECT * FROM paybitcommande WHERE reference=?"); $query->execute(array($id_transaction)); $cpp=$query->rowCount();
	if($cpp==0)
	{
	$idcmd=$infopayeur[3];$adresse=$infopayeur[2];
	$query=$bdd->prepare("INSERT INTO paybitcommande VALUES(?, ?, ?, ?, ?, ?, now())"); 
	if($query->execute(array('', $idmbre, $idcmd, 'CinetPay', $montant, $id_transaction)))
	{
		$query=$bdd->prepare("UPDATE bitcommande SET stat=1 WHERE idbitcmd=?"); $query->execute(array($idcmd));
	} } } } catch(Exception $e) { throw new Exception($e); } echo 'paiementab reglé hors try';	
?>