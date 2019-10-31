<?php
require_once 'connexionbdd.php';
	$sqlMdp = $bdd->query( "SELECT mdp FROM motdepasse AS m1 LEFT OUTER JOIN motdepasse AS m2 ON m1.dateDebut = m2.max(m2.dateDebut) WHERE idUser = 16");

	$dataMdp = $sqlMdp->fetch();

	echo $dataMdp['mdp'];
?>