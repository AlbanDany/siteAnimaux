<?php
	require_once 'connexionbdd.php'; // On appelle la base de données
	
	// On assaini les données, et on crypte le mdp
	$user = $_GET['user'];
	$ancien = test_input($_POST['ancienmdp']);	
	$mdp = test_input($_POST['motdepasse']);
	$mdpConfirm = test_input($_POST['mdpConfirm']);
	$mdphash = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
	
	$sqlCheck = 'SELECT idUser FROM utilisateur WHERE nom = "'.$user.'"'; //Permet de récupérer user 
	$resCheck = $mysqli->query($sqlCheck) or die($mysqli->error);
	$data = mysqli_fetch_array($resCheck,MYSQLI_ASSOC);
	
	$idUser = $data['idUser'];
	
	$queryMdp = $mysqli->prepare('UPDATE utilisateur SET mdp=? WHERE idUser = ?');
	$queryMdp->bind_param('ss',$mdphash, $idUser); // On rentre les paramètres 
	if (empty($user) || empty($_POST['motdepasse']) || empty($email) ) //Oubli d'un champs
	{
		$_SESSION['erreur'] = "Vous devez remplir tous les champs";
		header("Location: inscription.php");
	}
?>