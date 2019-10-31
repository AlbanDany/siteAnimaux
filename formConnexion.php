<?php
	
require_once 'connexionbdd.php';

$user = test_input($_POST['user']);
$mdp = password_hash('"'.$_POST['mdp'].'"', PASSWORD_BCRYPT);



$sql = $bdd->query( "SELECT id,nom,actif, FROM utilisateur WHERE nom ='".$user."'");
$dataUser = $sql->fetch();

$sqlMdp = $bdd->query( "SELECT mdp, dateDebut FROM motdepasse WHERE idUser = '".$dataUser['id']."'");
$dataMdp = $sqlMdp->fetch();


$date = date_create($dataUser['dateDebut']);
$dateFin = date_add($date, date_interval_create_from_date_string('3 months'));
$dateJour= date_create(date('Y-m-d'));

$_SESSION['User'] = $user;


if (empty($user) || empty($_POST['mdp']) ) //Oublie d'un champ
{
	$_SESSION['message'] = "Vous devez remplir tous les champs"; 
	return header("Location: connexion.php");
}

if ($dateJour > $dateFin){ //Le mot de passe a plus de 3 mois
	$_SESSION['message'] = "Mot de passe expiré";
	return header("Location: nouveaumdp.php?user='$user'"); //revoie du user par GET
}

if ($user != $dataUser['nom']){
	$_SESSION['message'] = "Pas d'utilisateur correspondant";
	return header("Location: connexion.php");
}

if ($dataUser['actif'] == 0)
{
	$_SESSION['message'] =  "Veuillez activer votre compte";
	return header("Location: connexion.php");
}

if ($user == $dataUser['nom'] && $dataUser['actif'] == 1){ //L'utilisateur est correct
	if (password_verify $mdp, $dataMdp['mdp'])) // Le mot de passe est correct
	{ 
		header("Location: index.php");
	}
	else
	{
		$_SESSION['message'] =  "Mauvais mot de passe";	
		return header("Location: connexion.php");
	}
}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlentities($data);
	  return $data;
	}
?>