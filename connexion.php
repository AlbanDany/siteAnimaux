<?php session_start(); ?>
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
						<td><input type="submit" value="Connexion" name="btnConnexion"></td>
					</tr>
					<tr>
					<td>	<?php if (isset ($_SESSION['message']))
					{
							echo $_SESSION['message'];
					} ?>
					</td>
					</tr>
				</table>
		</fieldset>
	</form>
	
</html>