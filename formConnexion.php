<?php

	$mysqli = new mysqli('127.0.0.1', 'root', '', 'siteanimaux');
if ($mysqli->connect_errno) {
    echo "Désolé, le site web subit des problèmes.";
    echo "Error: Échec d'établir une connexion MySQL, voici pourquoi : \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}

$user = $_POST['user'];
$mdp = $_POST['mdp'];

$sql = 'SELECT mdp  FROM utilisateur WHERE nom="'.$_POST['user'].'"';
$result = $mysqli->query($sql) or die($mysqli->error);
$mdpbdd = mysqli_fetch_array($result,MYSQLI_NUM);
	
if (isset($_POST['mdp']) AND $_POST['mdp'] == $mdpbdd[0]){
	echo "hello there";
}
else{
	echo "Mauvais mot de passe";	
}

?>