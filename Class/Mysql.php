<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='proexag'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
try
{
        $sql = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
 
catch(Exception $e)
{
	//Gestion Erreur SQL
	if($e->getCode() == 1049)
	{
		die('La base de donnée est introuvable');
	}
}
?>