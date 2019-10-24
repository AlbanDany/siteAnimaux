<html>
	<link rel="stylesheet" href="inscription.css">
	<form action="formInscription.php" method="post">
		<fieldset>
				<table>
					<tr>
						<td>Entrer un utilisateur</td> 
						<td><input type="text" name="utilisateur"autofocus/></td>
					</tr>
					<tr>
						<td>Entrer un mot de passe</td>
						<td><input type="password" name="motdepasse" /></td>
					</tr>
					<tr>
						<td><input type="submit" value="S'inscrire"></td>
					</tr>
					<tr>
						<td><?php session_start(); 
							if (isset($_SESSION['erreur'])){
								echo $_SESSION['erreur'];
							}?></td>
					</tr>
				</table>
		</fieldset>
	</form>
</html>