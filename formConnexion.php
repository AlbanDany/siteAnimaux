<?php
session_destroy();
session_start();	
require_once 'connexionbdd.php';

$user = htmlspecialchars($_POST['user']);
//$mdp = password_hash('"'.$_POST['mdp'].'"', PASSWORD_BCRYPT);


$sql = 'SELECT nom,mdp FROM utilisateur WHERE nom="'.$_POST['user'].'"';
$result = $mysqli->query($sql) or die($mysqli->error);
$mdpbdd = mysqli_fetch_array($result,MYSQLI_ASSOC);
//setcookie("User", $_POST['user']);
$_SESSION['User'] = $user;

//echo $mdpbdd['mdp'];
if (empty($_POST['user']) || empty($_POST['mdp']) ) //Oublie d'un champ
{
	$_SESSION['message'] = "Vous devez remplir tous les champs";
	header("Location: connexion.php");
}
else if ($user == $mdpbdd['nom']){ //L'utilisateur est correct
	if (password_verify ($_POST['mdp'], $mdpbdd['mdp'])){ // Le mot de passe est correct
		header("Location: index.php");
		}
	else{
		$_SESSION['message'] =  "Mauvais mot de passe";	
		header("Location: connexion.php");
	}
}
else{
	$_SESSION['message'] = "Mauvais utilisateur";
	header("Location: connexion.php");
}


?>