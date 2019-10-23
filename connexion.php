<html>
	<link rel="stylesheet" href="connexion.css">
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
					<tr>
						<td><input type="submit" value="Inscription"></td>
					</tr>
					<tr>
					<td>	<?php if (isset ($_GET["message"]))
					{
						echo $_GET["message"];
					} ?>
					</td>
					</tr>
				</table>
		</fieldset>
	</form>
	
</html>