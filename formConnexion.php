<?php
session_destroy();
session_start();	
require_once 'connexionbdd.php';

$user = test_input($_POST['user']);
//$mdp = password_hash('"'.$_POST['mdp'].'"', PASSWORD_BCRYPT);


$sql = 'SELECT nom,mdp,actif FROM utilisateur WHERE nom="'.$user.'"';
$result = $mysqli->query($sql) or die($mysqli->error);
$mdpbdd = mysqli_fetch_array($result,MYSQLI_ASSOC);
//setcookie("User", $_POST['user']);
$_SESSION['User'] = $user;

//echo $mdpbdd['mdp'];
if (empty($user) || empty($_POST['mdp']) ) //Oublie d'un champ
{
	$_SESSION['message'] = "Vous devez remplir tous les champs"; 
	header("Location: connexion.php");
	
}
else if ($user == $mdpbdd['nom'] && $mdpbdd['actif'] == 1){ //L'utilisateur est correct
	if (password_verify ($_POST['mdp'], $mdpbdd['mdp'])){ // Le mot de passe est correct
		header("Location: index.php");
		}
	else{
		$_SESSION['message'] =  "Mauvais mot de passe";	
		header("Location: connexion.php");
	}
}
else if ($user != $mdpbdd['nom']){
	$_SESSION['message'] = "Pas d'utilisateur correspondant";
	header("Location: connexion.php");
}
else if ($mdpbdd['actif'] == 0)
	{
		$_SESSION['message'] =  "Veuillez activer votre compte";	
		header("Location: connexion.php");
	}

	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlentities($data);
	  return $data;
	}

	

	
	
	
	
	
	
	
	
	
?>