<?php 
	class Home {
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
	}
 ?>