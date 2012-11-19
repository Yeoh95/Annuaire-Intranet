<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="style.css" />
		<title>Annuaire T&eacute;l&eacute;phonique</title>
	</head>
	<body>
		<?php
			// Connexion à la base de donnée
			$connection = mysql_connect('localhost','login','password');
			mysql_select_db('annuaire');
			// Nom de la table
			$tablename = 'annuaire';
			// Tri sur colonne
			$tri_autorises = array('nom','prenom','tel','poste');
			$order_by = in_array(isset($_GET['order']),$tri_autorises) ? $_GET['order'] : 'nom';
			// Sens du tri
			$order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
			// Préparation de la requête
			$sql = "
				SELECT *
				FROM {$tablename}
				ORDER BY {$order_by} {$order_dir}
			";
			$result = mysql_query($sql);
			// Fonction qui affiche les liens
			function sort_link($text, $order=false)
				{
					global $order_by, $order_dir;
					if(!$order)
						$order = $text;
						$link = '<a href="?order=' . $order;
					if($order_by==$order && $order_dir=='ASC')
						$link .= '&inverse=true';
						$link .= '"';
					if($order_by==$order && $order_dir=='ASC')
						$link .= ' class="order_asc"';
					elseif($order_by==$order && $order_dir=='DESC')
						$link .= ' class="order_desc"';
						$link .= '>' . $text . '</a>';
					return $link;
				}
			// Affichage
		?>
		<h2>Annuaire T&eacute;l&eacute;phonique</h2>
		<h3>(Cliquez sur l'en-t&ecirc;te d'une colonne pour effectuer un tri)</h3>
		<table class="tb_annuaire">
			<tr style="background-color:#0B59B2">
				<th><?php echo sort_link('NOM', 'nom') ?></th>
				<th><?php echo sort_link('PRENOM', 'prenom') ?></th>
				<th><?php echo sort_link('TELEPHONE', 'tel') ?></th>
				<th><?php echo sort_link('FONCTION', 'poste') ?></th>
			</tr>
		<?php while( $row=mysql_fetch_assoc($result) ) : ?>
			<tr style="background-color:<?php global $i; echo (++$i%2==0 ? "#DDE8F6" : "#FFFFFF"); ?>">
				<td><?php echo $row['nom'] ?></td>
				<td><?php echo $row['prenom'] ?></td>
				<td><center><?php echo $row['tel'] ?></center></td>
				<td><?php echo $row['poste'] ?></td>
			</tr>
		<?php endwhile ?>
		</table>
		<?php mysql_close($connection); ?>
	</body>
</html>