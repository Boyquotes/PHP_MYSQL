
<?php


//Selection et restitution d'infos dans et depuis la base de données.
$select = $oPDO->query
	('SELECT * FROM ' .$db_table);

while($infos = $select->fetch()) 
{
	echo 	'<h2>'.$infos['prenom'].' '.$infos['nom'].'</h2>
			<a href='.$infos['github'].'>Lien github</a>';
}



//----------Initialisation de la connection à la base de données.
$oPDO = PDOConnect($db_dsn, $db_login, $db_pass);	


//----------Préparation de la requête $oPDOEnregistrement.
try
{
	//Création d'une requête préparée.
	$oPDOEnregistrement = $oPDO->prepare
		(
			'INSERT INTO ' .$db_table. '(prenom, nom, github)
			VALUES (:prenom, :nom, :github)'
		);
			
	//Ajout de chaque paramètre à la requête (Protection des paramètres par l'objet PDO).
	$oPDOEnregistrement->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
	$oPDOEnregistrement->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
	$oPDOEnregistrement->bindParam(':github', $_POST['github'], PDO::PARAM_STR);
			
	//Execution de la requête préparée.
	$oPDOEnregistrement->execute();
	
	echo "<br />Vos informations ont bien été enregistrées." ;	
}
catch (PDOEXCEPTION $e)
{
	echo 'Une erreur est survenue lors de la tentative de connection à la base de données.' .$e->getMessage();		
}	

?>
	