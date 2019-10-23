<?php
require_once 'connexionbdd.php';
//Requete insérant les données dans la table animal
$nom = $_POST['nom'];
$origine = $_POST['origine'];
$taille = $_POST['taille'];

$sql = 'INSERT INTO animal(nom, origine, taille) VALUES("'.$nom.'", "'.$origine.'", "'.$taille.'")';
$result = $mysqli->query($sql) or die($mysqli->error);


//Requete insérant les données dans la table dangerosite

$reqDanger = $bdd->prepare('INSERT INTO dangerosite(letal, blesser, offensif, resistance, furtivite, peur, repartition, intelligence, unique) VALUES(:letal, :blesser, :offensif, :resistance, :furtivite, :peur, :repartition, :intelligence, :unique)');
$reqDanger -> execute(array(
		
		'nom' => $nom,
		'origine' => $origine,
		'taille' => $taille,
));

	if($_POST['letalAnimal'] = "oui" ){echo "okay"; }
	echo 'Votre nom est '.$_POST['nom'].' origine '.$_POST['origine'];

?>