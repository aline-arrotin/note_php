<?php 
	//Connexion au serveur mySql
	define("DB_USER", "root");
	define("DB_NAME", "ingrwf04_post-it");
	define("DB_HOST", "localhost");
	define("DB_PASSWORD", "root");
	//Parametre a changer lorsqu'on migrera le site vers notre serveur.

	$db_connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	//print_r($db_connect);

	if($db_connect->connect_errno) ://JE check s'il y a une erreur et errno indique le num d'erreur.
		echo "Echec de la connexion à dbase : ".$db_connect->connect_error;
		exit;

	else : $db_connect->set_charset("utf8"); //Les transactions vont se faire en utf8
	
	endif;

?>