<?php session_start(); ?>
<html>
	<link rel="stylesheet" href="connexion.css">
	<form action="formmdp.php" method="post">
		<fieldset>
				<table>
					<tr>
						<td>Ancien mot de passe</td> 
						<td><input type="password" name="ancienmdp"autofocus/></td>
					</tr>
					<tr>
						<td>Nouveau mot de passe
						</br></td>
						<td><input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
									required title="8 caracteres minimum, 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial" name="motdepasse" /></td>
					</tr>
					<tr>
						<td>Confirmer votre mot de passe </td>
						<td><input type="password" name="mdpConfirm" /></td>
					</tr>
					<tr>
						<td><input type="submit" value="Enregistrer" name="btnSave"></td>
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