<?php

require_once 'connexionbdd.php';
$sql = 'SELECT nom,mdp,actif,dateDebut FROM utilisateur WHERE nom="oui"';
$result = $mysqli->query($sql) or die($mysqli->error);
$mdpbdd = mysqli_fetch_array($result,MYSQLI_ASSOC);

$date = date_create($mdpbdd['dateDebut']);
$dateFin = date_add($date, date_interval_create_from_date_string('3 months'));
echo date_format($dateFin, 'Y-m-d'), "<br>";


$date = date_create($mdpbdd['dateDebut']);
		$dateFin = date_add($date, date_interval_create_from_date_string('3 months'));
		$dateJour= date("Y-m-d");
echo $dateJour;
if ($dateFin <= $dateJour){
			$_SESSION['message'] = "Mot de passe expiré";
			header("Location: connexion.php");
		}

	// $headers = 'From: Experditeur <example@mail.com>' . "\r\n";	
	// $headers .= "X-Mailer: PHP ".phpversion()."\n";
	// $headers .= "X-Priority: 1 \n";
	// $headers .= "Mime-Version: 1.0\n";
	// $headers .= "Content-Transfer-Encoding: 8bit\n";
	// $headers .= "Content-type: text/html; charset= utf-8\n";
	// $headers .= "Date:" . date("D, d M Y h:s:i") . " +0200\n";	
// mail('albandany1@gmail.com',"hey", "ca va", $headers);
?>