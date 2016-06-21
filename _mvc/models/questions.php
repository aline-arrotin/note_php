<?php 
	class Questions {
		function __construct(){ // Indique que c'est la fonction par défault

		}

		function delete ($post) {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("DELETE FROM question WHERE id_questions='%s'",
			$_GET['delete']
			);

			sqlAff($sql);
			$listeQ = $db_connect -> query($sql);
			echo $db_connect ->error;

			return $post["id_question"];

		}

		function insert ($post) {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("INSERT INTO question SET titre='%s', id_auteur=%s, date= '%s'",
			addslashes($post['titre']),
			1,
			date('Y-m-d')
			);

			sqlAff($sql);
			$listeQ = $db_connect -> query($sql);
			echo $db_connect ->error;

		}

		function listing () {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = "SELECT * FROM question ORDER BY date DESC";
			sqlAff($sql);
			$listeQ = $db_connect -> query($sql);
			echo $db_connect ->error;
			while($row = $listeQ ->fetch_object()) :
				$allRows[] = $row;
			endwhile;

			//AllRows = $listQ ->fetch_all(MYSQLI_ASSOC);
			return $allRows;
		}

		function listingQA () {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = "SELECT * FROM question_auteur ORDER BY date DESC";
			sqlAff($sql);
			$listeQ = $db_connect -> query($sql);
			echo $db_connect ->error;

			while($row = $listeQ ->fetch_object()) :
				$allRows[] = $row;
			endwhile;

			//AllRows = $listQ ->fetch_all(MYSQLI_ASSOC);
			return $allRows;
		}
	}
 ?>