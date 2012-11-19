<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="../style.css" />
		<title>Formulaire de saisie</title>
	</head>
	<body>
		<p>
			<a href="index.html"><img src="../img/fleche.gif" alt="Bouton retour" title="Cliquez pour revenir sur la page d'administration" /></a>
		</p>
		<h2>
			<p>Formulaire de saisie</p>
		</h2>
		<form action="ajout.php" method="post">
			<p>
				<table class="tb_annuaire">
					<tr>
						<td>
							<label for="nom"><b>Nom</b></label> : 
						</td>
						<td>
							<input type="text" name="nom" id="nom" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="prenom"><b>Prenom</b></label> : 
						</td>
						<td>
							<input type="text" name="prenom" id="prenom" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="tel"><b>T&eacute;l&eacute;phone</b></label> : 
						</td>
						<td>
							<input type="text" name="tel" id="tel" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="poste"><b>Fonction</b></label> : 
						</td>
						<td>
							<input type="text" name="poste" id="poste" />
						</td>
					</tr>
				</table>
					<center>
						<br />
						<input type="submit" value="Ajouter" />
					</center>
			</p>
		</form>
		<?php
			if(isset($_POST['nom']))      $nom=$_POST['nom'];
			else     $nom="";

			if(isset($_POST['prenom']))   $prenom=$_POST['prenom'];
			else     $prenom="";

			if(isset($_POST['tel']))      $tel=$_POST['tel'];
			else     $tel="";

			if(isset($_POST['poste']))    $poste=$_POST['poste'];
			else     $poste="";
			// On vérifie si les champs sont vides
			if(empty($nom) OR empty($prenom) OR empty($tel) OR empty($poste))
			{
				echo '<h3>Attention, l\'un des champs est vide !</h3>';
			}
			else     
			{
				// Connexion à la base de donnée
				$connection = mysql_connect('localhost','login','password');
				mysql_select_db('annuaire');
				// Nom de la table
				$tablename = 'annuaire';
				$sql = "
					INSERT INTO {$tablename} (nom ,prenom ,tel ,poste)
					VALUES ('$nom', '$prenom', '$tel', '$poste');
				";
				mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
				echo '<h3>Vos informations ont été ajoutées</h3>';
				mysql_close($connection);
			}
		?>
	</body>
</html>