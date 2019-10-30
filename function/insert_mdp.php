<?php function insert_mdp($bdd,$mdp,$userID){	
		
	$queryMdp = $bdd->prepare("INSERT INTO motdepasse (
		mdp,
		dateDebut,
		idUser	
		) 
		VALUES (
		:mdp,
		now(),
		:idUser
		)");
	
	$queryMdp->bindParam(':mdp', $mdp);
	
	$queryMdp->bindParam(':idUser', $userID);
	//$queryMdp->bindParam(':idUser', $idUser);	
	$queryMdp->execute();
	}
	