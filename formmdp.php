<?php
	require_once 'connexionbdd.php'; // On appelle la base de données
	
	// On assaini les données, et on crypte le mdp
	$user = $_GET['user'];
	$ancien = test_input($_POST['ancienmdp']);	
	$mdp = test_input($_POST['motdepasse']);
	$mdpConfirm = test_input($_POST['mdpConfirm']);
	$mdphash = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
	
	$sqlCheck = $bdd->query('SELECT idUser FROM utilisateur WHERE nom = "'.$user.'"'); //Permet de récupérer user 
	$data = $sqlCheck->fetch();
	
	$idUser = $data['idUser'];
	
	$queryMdp = $bdd->prepare('UPDATE utilisateur SET mdp= :mdp WHERE idUser = :idUser');
	$queryMdp->bindParam(':mdp',$mdphash);
	$queryMdp->bindParam(':idUser',$idUser); 
	$queryMdp->execute();// On rentre les paramètres 
	
	if (empty($user) || empty($_POST['motdepasse']) || empty($email) ) //Oubli d'un champs
	{
		$_SESSION['erreur'] = "Vous devez remplir tous les champs";
		return header("Location: inscription.php");
	}
?>