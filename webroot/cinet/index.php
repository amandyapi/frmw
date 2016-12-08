<?php
//&& $_SESSION['duree']!=NULL
if(session_start() && $_SESSION['Membre']->id!=NULL  && $_SESSION['price']!=NULL && $_SESSION['desc']!=NULL)
{
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$desc=$_SESSION['desc']; $price=$_SESSION['price']; //$duree=$_SESSION['duree']; 
	$idpay=$_SESSION['Membre']->id;
	
	require_once('CinetPay.php');
	echo'Vous serez redirigé vers la page de PAIEMENT MOBILE.';
	try 
	{   //.$duree.'|'
		$id_transaction = date("YmdHis").$idpay;
		$description_du_paiement = $desc;
		$date_transaction = date("Y-m-d H:i:s");
		$montant_a_payer = $price;
		$identifiant_du_payeur = $idpay.'|'.$desc;
		$notify_url = ""; 
		$return_url = "";
		$cancel_url = "";
		$apiKey = "18718161895693e92612ded7.33252263"; 
		$site_id = "378245";
		$plateform = "PROD";//Use PROD if you switch in Production
		
		$formName = "goCinetPay";//Nom de votre formulaire
		$btnType = 2;//1-5
		$btnWidth = "200px";//largeur du bouton submit du formulaire
		$btnHeight = "50px";//hauteur du bouton submit du formulaire
		
		$CinetPay = new CinetPay($site_id,$apiKey,$plateform);
		$CinetPay->setTransId($id_transaction)
			  ->setDesignation($description_du_paiement)
			  ->setTransDate($date_transaction) // Au format d-m-Y H:i:s
			  ->setAmount($montant_a_payer)
			  ->setCustom($identifiant_du_payeur) // Champ optionel
			  ->displayPayButton($formName,$btnType,$btnWidth,$btnHeight);
	}
	catch(Exception $e) 
	{
		throw new Exception($e);
	}
    echo 
	'<script type="text/javascript">
	function formAutoSubmit () {
	var frm = document.getElementById("goCinetPay");
	frm.submit();
	}
	window.onload = formAutoSubmit;
	</script>';
}
?>

