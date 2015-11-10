<?php

/** Dans ce fichier, toutes les fonctions et procédures utiles à l'application **/



//----------Connection à la base de données par une fonction.
function PDOConnect($sDbDsn, $sDbLogin, $sDbPass) 
{
	try
		{
			$oPDO= new PDO($sDbDsn, $sDbLogin, $sDbPass);
			$oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch (PDOEXCEPTION $e)
		{
			echo 'Une erreur est survenue lors de la tentative de connection à la base de données.' .$e->getMessage();		
		}
	
	return $oPDO;
}

?>