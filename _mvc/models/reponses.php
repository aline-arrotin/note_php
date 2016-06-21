<?php 
	class Reponses {
		function __construct(){ // Indique que c'est la fonction par défault

		}

		function delete ($post) {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("DELETE FROM reponse WHERE label='%s', id_auteur='%s', date= '%s', id_question='%s'",
			addslashes($post['label']),
			1,
			date('Y-m-d'),
			$post["id_question"]
			);

			sqlAff($sql);
			$listeQ = $db_connect -> query($sql);
			echo $db_connect ->error;

			return $post["id_question"];

		}

		function insert ($post) {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("INSERT INTO reponse SET label='%s', id_auteur='%s', date= '%s', id_question='%s'",
			addslashes($post['label']),
			1,
			date('Y-m-d'),
			$post["id_question"]
			);

			sqlAff($sql);
			$listeQ = $db_connect -> query($sql);
			echo $db_connect ->error;

			return $post["id_question"];

		}

		function listing () {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("SELECT * FROM reponse WHERE id_questions = $id_questions ORDER BY date DESC", $_GET['id_questions']);
			sqlAff($sql);
			$listeR = $db_connect -> query($sql);
			echo $db_connect ->error;
			while($row = $listeR ->fetch_object()) :
				$allRows[] = $row;
			endwhile;

			//AllRows = $listQ ->fetch_all(MYSQLI_ASSOC);
			return $allRows;
		}

		function listingREP () {
			global $db_connect; // Indique qu il doit aller chercher cette variable en dehors de l'objet.
			$sql = sprintf("SELECT * FROM questions_reponses WHERE id_questions='%s' ORDER BY repondue DESC",$_GET['id_question']);
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
	}
 ?>