<?php
function bdd_connect() 
{
	$dsn = 'mysql:dbname=u330710098_smrts; host=mysql.hostinger.fr';
	$user = 'u330710098_smrts';
	$password = 'smartslife2016';
	try 
	{
		$bdd = new PDO($dsn, $user, $password);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Échec lors de la connexion : ' . $e->getMessage();
	}
	return $bdd;
}
?>