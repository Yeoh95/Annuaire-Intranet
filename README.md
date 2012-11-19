Annuaire téléphonique Intranet
------------------------------

Pour l'exemple voici ma configuration :
-------------------------------------

serveur de bdd : localhost

Login de la bdd : login

Mot de passe de la bdd : password

Nom de la bdd : annuaire

Nom de la table : annuaire

Champs de la table :
------------------

CREATE TABLE IF NOT EXISTS `annuaire` (
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `tel` varchar(40) NOT NULL,
  `poste` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
