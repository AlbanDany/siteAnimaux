<!DOCTYPE html>
<?php

//$bdd = new PDO('mysql:host=localhost;dbname=siteanimaux;charset=utf8', 'root', '');
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=siteanimaux;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$nom = $_POST['nom'];
$origine = $_POST['origine'];
$taille = $_POST['taille'];

$reqAnimal = $bdd->prepare('INSERT INTO animal(nom, origine, taille) VALUES(:nom, :origine, :taille)');
$reqAnimal-> execute(array(
		
		'nom' => $nom,
		'origine' => $origine,
		'taille' => $taille,
));


$letal = $_POST['letal'];

$reqDanger = $bdd->prepare('INSERT INTO dangerosite(letal, blesser, offensif, resistance, furtivite, peur, repartition, intelligence, unique) VALUES(:letal, :blesser, :offensif, :resistance, :furtivite, :peur, :repartition, :intelligence, :unique)');
$reqDanger -> execute(array(
		
		'nom' => $nom,
		'origine' => $origine,
		'taille' => $taille,
));

	echo 'Votre nom est '.$_POST['nom'].' origine '.$_POST['origine'];

?>