<?php
	require_once 'connexionbdd.php'; // On appelle la base de données
	require_once './function/insert_mdp.php'; //Fonction qui permet d'insérer le mdp 
	require_once './function/insert_user.php';  //Fonction qui permet d'insérer les infos de l'utilisateur
	$bdd = new PDO('mysql:host=localhost;dbname=siteanimaux', 'root', '');
	
	// On assaini les données, et on crypte le mdp
	$user = test_input($_POST['utilisateur']);	
	$email = $_POST['adresseMail'];
	$actif = 0; //Par défaut le compte est inactif
	$mdp = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
	$token = bin2hex(random_bytes(32));



	$sqlCheck = $bdd->query("SELECT nom, email,idUser FROM utilisateur WHERE nom = '".$user."' OR email= '".$email."' ");
	$sqlCheck->execute();
	$resCheck = $sqlCheck->fetch();

//On test et vérifie les erreurs

	if (empty($user) || empty($_POST['motdepasse']) || empty($email) ) //Oubli d'un champs
	{
		$_SESSION['erreur'] = "Vous devez remplir tous les champs";
		return header("Location: inscription.php");
	}

	if (strtolower ($user) == strtolower($resCheck['nom'])) //l'utilisateur existe déjà
	{		
		$_SESSION['erreur'] = "Utilisateur existant";
		return header("Location: inscription.php");
	}	

	if (strtolower ($email) == strtolower($resCheck['email'])) //l'email est déjà utilisé
	{		
		$_SESSION['erreur'] = "Email déjà utilisé";
		return header("Location: inscription.php");
	}	

	if (!isset($_POST['mdpConfirm']) || ($_POST['mdpConfirm'] != $_POST['motdepasse'])) // La confirmation de mdp est fausse
	{ 

		$_SESSION['erreur'] = "Confirmation de mot de passe éronée";
		return header("Location: inscription.php");
	}
	 

	 //Si il n'y a pas d'erreurs  
			
		$userID = insert_user($bdd,$user,$email,$token,$actif);
		echo $userID;
		insert_mdp($bdd,$mdp,$userID);
		$_SESSION['message'] = "Inscription réussie, veuillez vous connecter ";
		header("Location: connexion.php");
	
	
	//Fonction qui permet d'assainir les données
	function test_input($resCheck) {
	  $resCheck = trim($resCheck); //Supprime les caractères invisibles et espaces
	  $resCheck = addslashes($resCheck); // ajoute des antislash devant les caractères ",',\,NUL 
	  $resCheck = htmlspecialchars($resCheck); //Converti les caractères spéciaux en HTML
	  return $resCheck;
	}
	
	
	


	?>
