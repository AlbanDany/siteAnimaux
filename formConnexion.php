<?php
	
require_once 'connexionbdd.php';

$user = $_POST['user'];
//$mdp = password_hash('"'.$_POST['mdp'].'"', PASSWORD_BCRYPT);


$sql = 'SELECT nom,mdp FROM utilisateur WHERE nom="'.$_POST['user'].'"';
$result = $mysqli->query($sql) or die($mysqli->error);
$mdpbdd = mysqli_fetch_array($result,MYSQLI_ASSOC);
//echo $mdpbdd['mdp'];
if (empty($_POST['user']) || empty($_POST['mdp']) ) //Oublie d'un champ
{
	$message = "Vous devez remplir tous les champs";
}
else if ($user == $mdpbdd['nom']){
	if (password_verify ($_POST['mdp'], $mdpbdd['mdp'])){
		$message =  "hello there";
		}
	else{
		$message =  "Mauvais mot de passe";	
	}
}
else{
	$message = "Mauvais utilisateur";
}

header("Location: connexion.php?message=$message");
?>