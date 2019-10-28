<?php
	require_once 'connexionbdd.php'; // On appelle la base de données
	
	// On assaini les données, et on crypte le mdp
	$user = test_input($_POST['utilisateur']);	
	$email = test_input($_POST['adresseMail']);
	$mdp = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
	$actif = 0;
	$id = null;
	$key = gen_cle();
	$mdp2 = $mdp;
	$mdp3 = $mdp2;
	$mdp4 = $mdp3;
	$mdp5 = $mdp4;
	
	$dateJour= date("Y-m-d");
	$sqlCheck = 'SELECT nom, email,idUser FROM utilisateur WHERE nom = "'.$user.'" OR email= "'.$email.'"'; //Permet de récupérer user et email si ils sont pareils
	$resCheck = $mysqli->query($sqlCheck) or die($mysqli->error);
	$data = mysqli_fetch_array($resCheck,MYSQLI_ASSOC);
	$idUser = 1;
	$query = $mysqli->prepare('INSERT INTO utilisateur (idUser, nom, mdp, idBestiaire, email,confirmKey,actif,dateDebut) VALUES (?,?,?,?,?,?,?,?)'); //Prepare la requete d'insertion de données
	$query->bind_param('ssssssss',$id, $user, $mdp, $id, $email,$key,$actif,$dateJour); // On rentre les paramètres : id correspond a une valeur NULL
	
	// $queryuser = $mysqli->prepare('SELECT idUser FROM utilisateur WHERE nom = ?'); 
	// $queryuser->bind_param('i', $user); 
	
	$queryMdp = $mysqli->prepare('INSERT INTO motdepasse (idMotdepasse, idUser, mdp1,mdp2,mdp3,mdp4,mdp5) VALUES (?,?,?,?,?,?,?)');
	$queryMdp->bind_param('iisssss',$id, $idUser, $mdp,$mdp2, $mdp3, $mdp4, $mdp5); // On rentre les paramètres : id correspond a une valeur NULL
	
	if (empty($user) || empty($_POST['motdepasse']) || empty($email) ) //Oubli d'un champs
	{
		$_SESSION['erreur'] = "Vous devez remplir tous les champs";
		header("Location: inscription.php");
	}
	else if (strtolower ($user) == strtolower($data['nom'])) //l'utilisateur existe déjà
	{		
		$_SESSION['erreur'] = "Utilisateur existant";
		header("Location: inscription.php");
	}		
	else if (strtolower ($email) == strtolower($data['email'])) //l'email est déjà utilisé
	{		
		$_SESSION['erreur'] = "Email déjà utilisé";
		header("Location: inscription.php");
	}		
	else if (!isset($_POST['mdpConfirm']) || ($_POST['mdpConfirm'] != $_POST['motdepasse'])) // La confirmation de mdp est fausse
	{ 

		$_SESSION['erreur'] = "Confirmation de mot de passe éronée";
		header("Location: inscription.php");
	}
	else //Si l'utilisateur n'existe pas, l'email n'est pas utilisé, et les mdp correspodent 
	{	
	
		//$result = $mysqli->query($sql) or die($mysqli->error);
		$query->execute(); // On execute la requete créée plus haut
		$query->close();
		$queryMdp->execute();
		$queryMdp->close();
		$_SESSION['message'] = "Inscription réussie, veuillez vous connecter ";
		header("Location: connexion.php");
	}
	
	//Fonction qui permet d'assainir les données
	function test_input($data) {
	  $data = trim($data); //Supprime les caractères invisibles et espaces
	  $data = addslashes($data); // ajoute des antislash devant les caractères ",',\,NUL 
	  $data = htmlspecialchars($data); //Converti les caractères spéciaux en HTML
	  return $data;
	}
	
	function gen_cle(){
		for ($i = 0; $i<16; $i++){
			$temp = mt_rand(0,9);
			$key .= $temp;
		}
		return $key;		
	}
	


?>
