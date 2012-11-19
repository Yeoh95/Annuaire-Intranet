<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="../style.css" />
		<title>Formulaire de modification</title>
	</head>
	<body>
		<p>
			<a href="index.html"><img src="../img/fleche.gif" alt="Bouton retour" title="Cliquez pour revenir sur la page d'administration" /></a>
		</p>
		<h2>
			<p>Formulaire de modification</p>
		</h2>
		<form action="modif.php" method="post">
			<h3>Profil &agrave; modifier</h3>
			<p>
				<table class="tb_annuaire">
					<tr>
						<td>
							<label for="nom1"><b>Nom</b></label> : 
						</td>
						<td>
							<input type="text" name="nom1" id="nom1" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="prenom1"><b>Prenom</b></label> : 
						</td>
						<td>
							<input type="text" name="prenom1" id="prenom1" />
						</td>
					</tr>
				</table>
				<br />
				<h3>Veuillez saisir les nouvelles informations</h3>
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
						<input type="submit" value="Modifier" />
					</center>
			</p>
		</form>
		<?php
			if(isset($_POST['nom1']))      $nom1=$_POST['nom1'];
			else     $nom1="";

			if(isset($_POST['prenom1']))   $prenom1=$_POST['prenom1'];
			else     $prenom1="";
			
			if(isset($_POST['nom']))      $nom=$_POST['nom'];
			else     $nom="";

			if(isset($_POST['prenom']))   $prenom=$_POST['prenom'];
			else     $prenom="";

			if(isset($_POST['tel']))      $tel=$_POST['tel'];
			else     $tel="";

			if(isset($_POST['poste']))    $poste=$_POST['poste'];
			else     $poste="";
			// On vérifie si les champs sont vides
			if(empty($nom1) OR empty($prenom1) OR empty($nom) OR empty($prenom) OR empty($tel) OR empty($poste))
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
					UPDATE {$tablename} 
					SET nom = '$nom',prenom = '$prenom',tel = '$tel',poste = '$poste'
					WHERE nom = '{$nom1}'
					AND prenom = '{$prenom1}' 
					LIMIT 1 ;
				";
				mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
				echo '<h3>Les modifications ont bien été prises en compte</h3>';
				mysql_close($connection);
			} 
		?>
	</body>
</html>