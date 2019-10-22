<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=siteanimaux;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//Requete insérant les données dans la table animal
$nom = $_POST['nom'];
$origine = $_POST['origine'];
$taille = $_POST['taille'];

$reqAnimal = $bdd->prepare('INSERT INTO animal(nom, origine, taille) VALUES(:nom, :origine, :taille)');
$reqAnimal-> execute(array(
		
		'nom' => $nom,
		'origine' => $origine,
		'taille' => $taille,
));


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