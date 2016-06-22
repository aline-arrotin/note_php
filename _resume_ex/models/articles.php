<?php 
	class Articles {
		function __construct(){ // Indique que c'est la fonction par défault

		}

		function listing ($label) {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("SELECT * FROM cats_arts_auteurs WHERE label = '%s' ORDER BY date DESC", 
				$label);

			sqlAff($sql);
			$listeH = $db_connect -> query($sql);
			echo $db_connect ->error;
			while($row = $listeH ->fetch_object()) :
				$allRows[] = $row;
			endwhile;

			//AllRows = $listQ ->fetch_all(MYSQLI_ASSOC);
			return $allRows;
		}

		function listingNoID ($idarticles, $idcategorie) {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("SELECT * FROM cats_arts_auteurs WHERE id_articles != '%s' AND id_categorie = %s ORDER BY date DESC", 
				$idarticles,
				$idcategorie);

			sqlAff($sql);
			$listeH = $db_connect -> query($sql);
			echo $db_connect ->error;
			while($row = $listeH ->fetch_object()) :
				$allRows[] = $row;
			endwhile;

			//AllRows = $listQ ->fetch_all(MYSQLI_ASSOC);
			return $allRows;
		}

		function theArticle ($idReponses) {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("SELECT * FROM cats_arts_auteurs WHERE id_articles='%s' ORDER BY date DESC",$idReponses);
			sqlAff($sql);
			$listeR = $db_connect -> query($sql);
			echo $db_connect ->error;
			$allRows = array();
			while($row = $listeR ->fetch_object()) :
				$allRows[] = $row;
			endwhile;

			//AllRows = $listQ ->fetch_all(MYSQLI_ASSOC);
			return $allRows;
		}

		function all () {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("SELECT * FROM cats_arts_auteurs ORDER BY date DESC LIMIT 0,5");

			sqlAff($sql);
			$listeH = $db_connect -> query($sql);
			echo $db_connect ->error;
			while($row = $listeH ->fetch_object()) :
				$allRows[] = $row;
			endwhile;

			return $allRows;

			}
	}
 ?>