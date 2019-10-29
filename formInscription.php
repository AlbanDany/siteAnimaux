<?php
	require_once 'connexionbdd.php'; // On appelle la base de données
	$bdd = new PDO('mysql:host=localhost;dbname=siteanimaux', 'root', '');
	// On assaini les données, et on crypte le mdp
	$user = test_input($_POST['utilisateur']);	
	$email = test_input($_POST['adresseMail']);
	$mdp = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
	$actif = 0;
	$id = null;
	$key='';
	$token = gen_cle($key);
	
	//$dateJour= date('Y-m-d');
	
	$sqlCheck = $bdd->query("SELECT nom, email,idUser FROM utilisateur WHERE nom = '".$user."' OR email= '".$email."' ");
	$sqlCheck->execute();
	$resCheck = $sqlCheck->fetch();
	
	$idUser = 1; //Obligé de l'inscrire en dur
	
	function insert_mdp($bdd,$idUser,$mdp){	
		
	$queryMdp = $bdd->prepare("INSERT INTO motdepasse (
		idMotdepasse,
		mdp,
		dateDebut,
		idUser	
		) 
		VALUES (
		NULL,
		:mdp,
		now(),
		:idUser
		)");
	$queryMdp->bindParam(':mdp', $mdp);
	$queryMdp->bindParam(':idUser', $idUser);	
	$queryMdp->execute();
	}
	
	// $queryuser = $mysqli->prepare('SELECT idUser FROM utilisateur WHERE nom = ?'); 
	// $queryuser->bind_param('i', $user); 
	
	
	
	
	if (empty($user) || empty($_POST['motdepasse']) || empty($email) ) //Oubli d'un champs
	{
		$_SESSION['erreur'] = "Vous devez remplir tous les champs";
		//header("Location: inscription.php");
	}
	else if (strtolower ($user) == strtolower($resCheck['nom'])) //l'utilisateur existe déjà
	{		
		$_SESSION['erreur'] = "Utilisateur existant";
		//header("Location: inscription.php");
	}		
	else if (strtolower ($email) == strtolower($resCheck['email'])) //l'email est déjà utilisé
	{		
		$_SESSION['erreur'] = "Email déjà utilisé";
		//header("Location: inscription.php");
	}		
	else if (!isset($_POST['mdpConfirm']) || ($_POST['mdpConfirm'] != $_POST['motdepasse'])) // La confirmation de mdp est fausse
	{ 

		$_SESSION['erreur'] = "Confirmation de mot de passe éronée";
		//header("Location: inscription.php");
	}
	else //Si l'utilisateur n'existe pas, l'email n'est pas utilisé, et les mdp correspodent 
	{		
		insert_user($bdd,$user,$email,$token,$actif);
		insert_mdp($bdd,$idUser,$mdp);
		$_SESSION['message'] = "Inscription réussie, veuillez vous connecter ";
		//header("Location: connexion.php");
	}
	
	//Fonction qui permet d'assainir les données
	function test_input($resCheck) {
	  $resCheck = trim($resCheck); //Supprime les caractères invisibles et espaces
	  $resCheck = addslashes($resCheck); // ajoute des antislash devant les caractères ",',\,NUL 
	  $resCheck = htmlspecialchars($resCheck); //Converti les caractères spéciaux en HTML
	  return $resCheck;
	}
	
	function gen_cle($key){
		for ($i = 0; $i<16; $i++){
			$temp = mt_rand(0,9);
			$key .= $temp;
		}
		return $key;		
	}
	
	function insert_user($bdd,$user,$email,$token,$actif){
	
	$query = $bdd->prepare('INSERT INTO utilisateur 
							(
							idUser, 
							nom,  
							idBestiaire, 
							email,
							confirmKey,
							actif
							) 
							VALUES 
							(
							NULL,
							:nom, 
							NULL, 
							:email, 
							:token, 
							:actif 
							'); //Prepare la requete d'insertion de données	
	$query->bindParam(':nom', $user);
	$query->bindParam(':email', $email);
	$query->bindParam(':token', $token);
	$query->bindParam(':actif', $actif);
	// $query->bindParam(':dateDebut', now());
	$query->execute();
	}

	?>
