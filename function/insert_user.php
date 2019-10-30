<?php function insert_user($bdd,$user,$email,$token,$actif){
	
	$query = $bdd->prepare('INSERT INTO utilisateur 
						(idUser,nom, idBestiaire, email,confirmKey,actif) VALUES (NULL,:nom, NULL,:email,:token,:actif)'); //Prepare la requete d'insertion de données	
	$query->bindParam(':nom', $user);
	$query->bindParam(':email', $email);
	$query->bindParam(':token', $token);
	$query->bindParam(':actif', $actif);
	// $query->bindParam(':dateDebut', now());
	$query->execute();

	return $bdd->lastInsertId();
}