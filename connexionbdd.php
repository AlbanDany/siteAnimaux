<?php
	$mysqli = new mysqli('127.0.0.1', 'root', '', 'siteanimaux');
if ($mysqli->connect_errno) {
    echo "Désolé, le site web subit des problèmes.";
    echo "Error: Échec d'établir une connexion MySQL, voici pourquoi : \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
?>