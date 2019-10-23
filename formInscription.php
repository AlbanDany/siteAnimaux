<?php
	require_once 'connexionbdd.php';
	
	$user = $_POST['utilisateur'];
	$mdp = password_hash('"'.$_POST['motdepasse'].'"', PASSWORD_BCRYPT);



	if (empty($_POST['utilisateur']) || empty($_POST['motdepasse']) ) //Oublie d'un champ
	{
		$message = "Vous devez remplir tous les champs";
	}
	else {
		
		$sql = 'INSERT INTO utilisateur (idUser, nom, mdp, idBestiaire) VALUES (NULL, "'.$user.'", "'.$mdp.'", NULL)';
		$result = $mysqli->query($sql) or die($mysqli->error);
		$message = "Utilisateur inscrit"
	}		

	header("Location: inscription.php?message=$message"); //Revoie direct a la page de connexion
?>