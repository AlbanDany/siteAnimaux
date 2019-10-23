<html>
	<link rel="stylesheet" href="style1.css">
	<form action="form.php" method="post">
		<fieldset>
			<table>
				<tr>
					<td>Nom de l'animal :</td> 
					<td><input type="text" name="nomAnimal" value="nom" autofocus/></td>
				</tr>
				<tr>
					<td>Origine :</td>
					<td><input type="text" name="origineAnimal" value="origine"/></td>
				</tr>
				<tr>
					<td>Taille (cm) :</td>
					<td><input type="number" name="tailleAnimal" value="taille" /></td>
				</tr>
				<tr>
					<td>Mortel ? :  </td>
					<td><input type="checkbox" name="letalAnimal" value="letal" /> </td> 
				</tr>
				<tr>
					<td>Peut blesser un homme ? : </td>
					<td><input type="checkbox" name="blesserAnimal" value="blesser"/> </td> 
				</tr>
				<tr>
					<td> Offensif ? :  </td>
					<td><input type="checkbox" name="offensifAnimal" value="offensif"/> </td> 
				</tr>
				<tr>
					<td> Furtivité ? : </td>
					<td><input type="checkbox" name="furtiviteAnimal" value="furtivite"/> </td> 
				</tr>
				<tr>
					<td> Peur ? :</td>
					<td><input type="checkbox" name="peurAnimal" value="peur"/> </td> 
				</tr>
				<tr>
					<td>  Repartition ? :</td>
					<td><input type="checkbox" name="repartitionAnimal" value="repartition"/> </td> 
				</tr>
				<tr>
					<td> Intelligence ? : </td>
					<td><input type="checkbox" name="intelligenceAnimal" value="intelligence"/> </td> 
				</tr>
				<tr>
					<td> Unique ? :</td>
					<td><input type="checkbox" name="uniqueAnimal" value="unique"/> </td> 
				</tr>
				<tr>
					<td> Image :</td>
					<td><input type="file" name="monImage" accept="image/*"></td> 
				</tr>
			</table>
		<p><input type="submit" value="OK"></p>
		</fieldset>
	</form>
</html>