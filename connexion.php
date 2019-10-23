<html>
	<link rel="stylesheet" href="connexion.css">
	<?php if (isset ($_GET["message"]))
	{
		echo $_GET["message"];
	} ?>
	<form action="formConnexion.php" method="post">
		<fieldset>
				<table>
					<tr>
						<td>Utilisateur</td> 
						<td><input type="text" name="user"autofocus/></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="mdp" /></td>
					</tr>
					<tr><td><input type="submit" value="Connexion"></td></tr>
				</table>
		</fieldset>
	</form>
</html>