<?php 
	
// affichage des Erreurs php
error_reporting(E_ALL); //Affiche toutes les erreurs et notices.
ini_set('display_errors', TRUE); //Affiche les erreurs
ini_set('display_startup_errors', TRUE);// Affiche de force les erreurs serveur. Forcer l affichage des erreurs (de démarrage).

//Ceci ne fonctionne pas avec MAMP.

	define("DB_USER", "root"); // si en localhost avec Mampp
	define("DB_NAME", "ingrwf04_qcm"); // nom de database
	define("DB_HOST", "localhost");// si en localhost avec Mampp
	define("DB_PASSWORD", "root");// si en localhost avec Mampp

	$db_connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); // connection

	if( $db_connect->connect_errno ) : //test
		echo "Echec de connexion à la database : " . $db_connect->connect_error;
		exit;
	
	else :
		$db_connect->set_charset("utf8");
		//echo "ok";
	endif;

	session_start();
 ?>