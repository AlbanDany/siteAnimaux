<html>
	<link rel="stylesheet" href="inscription.css">
	<form action="formInscription.php" method="post">
		<fieldset>
				<table>
					<tr>
						<td>Entrer un utilisateur</td> 
						<td><input type="text" name="utilisateur" pattern="[A-Za-z0-9]+"  required title="Lettres ou chiffre uniquement" autofocus/></td>
					</tr>
					<tr>
						<td>Entrer un mot de passe
						</br></td>
						<td><input type="password"  required title="8 caracteres minimum, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial" name="motdepasse" /></td>
					</tr>
					<tr>
						<td>Confirmer votre mot de passe </td>
						<td><input type="password" name="mdpConfirm" /></td>
					</tr>
					<tr>
						<td>Entrer votre adresse mail</td>
						<td><input type="email" name="adresseMail" /></td>

					</tr>
					<tr>
						<td><input type="submit" value="S'inscrire"></td>
					</tr>
					<tr>
						<td><?php session_start(); 
							if (isset($_SESSION['erreur'])){ // Affiche les erreurs
								echo $_SESSION['erreur'];
								$_SESSION['erreur'] =""; // ràz de la variable
							}?></td>
					</tr>
				</table>
		</fieldset>
	</form>
</html>
<!-- pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" --> 