

if (isset($_POST['nom']) && isset($_POST['origine'])) {
	// on affiche nos résultats
	echo 'Votre nom est '.$_POST['nom'].' origine '.$_POST['origine'];