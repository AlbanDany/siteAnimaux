<?php
	require_once 'connexionbdd.php'; // On appelle la base de données
	
	// On assaini les données, et on crypte le mdp
	$ancien = test_input($_POST['ancienmdp']);	
	$mdp = test_input($_POST['motdepasse']);
	$mdpConfirm = test_input($_POST['mdpConfirm']);
	$mdp = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
	
	$sqlCheck = 'SELECT nom, email FROM utilisateur WHERE nom = "'.$user.'" OR email= "'.$email.'"'; //Permet de récupérer user et email si ils sont pareils
	$resCheck = $mysqli->query($sqlCheck) or die($mysqli->error);
	$data = mysqli_fetch_array($resCheck,MYSQLI_ASSOC);
?>