<?php
session_start();
if (isset ($_COOKIE["User"])){
	echo '<h1>Bienvenue "'.$_COOKIE['User'].'" </h1>
	<a href="deconnexion.php"> Déconnexion </a>';
}
else{
	echo'
	<h1>Bienvenue </h1>
	<a href="connexion.php"> Connexion </a> <br/>
	<a href="inscription.php"> Inscription </a>';	
}
?>
