<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=siteanimaux;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$user = $_POST['user'];
$mdp = $_POST['mdp'];
$test; // Vrai si l'user et le mdp match
?>