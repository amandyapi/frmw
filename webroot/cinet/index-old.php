<?php
if(session_start() && $_SESSION['id']!=NULL && $_SESSION['duree']!=NULL && $_SESSION['price']!=NULL && $_SESSION['desc']!=NULL)
{
	$idmbre=$_SESSION['id']; $desc=$_SESSION['desc']; $prix=$_SESSION['price'];
	function postData($params, $url)
	{
		try 
		{
			// Build Http query using params
			$query = http_build_query ($params);
			// Create Http context details
			$options = array(
			'http' => array(
			'header' => "Content-Type: application/x-www-formurlencoded\r\n".
			"Content-Length: 
			".strlen($query)."\r\n".
			"User-Agent:MyAgent/1.0\r\n",
			'method' => "POST",
			'content' => $query,
			),
			);
			// Create context resource for our request
			$context = stream_context_create ($options);
			// Read page rendered as result of your POST request
			$result = file_get_contents (
			$url, // page url
			false,
			$context);
		} Catch()
	}
	//Tableau de données pour obtenir le solde du service sur le serveur de TEST
	$params["apikey"] = "18718161895693e92612ded7.33252263"; $params["cpm_payment_config"] = "SINGLE"; $params["cpm_page_action"] = "PAYMENT"; $params["cpm_version"] = "V1";
	$params["cpm_language"] = "fr"; $params["cpm_designation"] = $desc; $params["cpm_custom"] = "";
	$params["cpm_site_id"] = "144637"; $params["cpm_amount"] = $prix; $params["cpm_currency"] = "CFA"; $params["cpm_trans_id"] = $idmbre.uniqid(); $params["cpm_trans_date"] = Date('Y-m-d H:i:s');
	$url = "http://api.cinetpay.com/v1/?method=getSignatureByPost" ;
	//Appel de fonction postData()
	$resultat = postData($params, $url) ;
	echo  $resultat_json = json_decode($resultat, true) ;
}
else header('location: ../?page=connexion');
?>