<?php
	require_once 'connexionbdd.php';
	
	$user = test_input($_POST['utilisateur']);	
	$mdp = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
	
	$sqlCheck = 'SELECT nom FROM utilisateur WHERE nom = "'.$user.'"';
	$resCheck = $mysqli->query($sqlCheck) or die($mysqli->error);
	$login = mysqli_fetch_array($resCheck,MYSQLI_ASSOC);
	
	$sql = 'INSERT INTO utilisateur (idUser, nom, mdp, idBestiaire) VALUES (NULL, "'.$user.'", "'.$mdp.'", NULL)';
	
	echo  $login['nom'];
	if (empty($user) || empty($_POST['motdepasse']) ) //Oublie d'un champ
	{
		$_SESSION['erreur'] = "Vous devez remplir tous les champs";
		header("Location: inscription.php");
	}
	else if (strtolower ($user) == strtolower($login['nom'])) {		
		$_SESSION['erreur'] = "Utilisateur existant";
		header("Location: inscription.php");
	}		
	else {
		$result = $mysqli->query($sql) or die($mysqli->error);
		$_SESSION['message'] = "Inscription réussie, veuillez vous connecter";
		header("Location: connexion.php");
	}
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlentities($data);
	  return $data;
	}
?>