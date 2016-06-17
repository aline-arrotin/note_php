<?php include("config.php"); ?>
<?php include("function.php"); ?>
<?php


//Requête Questtion

$sql = "SELECT * FROM question WHERE id_questions = ".$_GET['id_questions']; //
//Requête à partir de ma table question. J'affiche l'id_questions (clé primaire définie dans la page index) par rapport à ma clé primaire. Ici l'id_questions vaut donc la clé primaire. Donc il compare l'id dans l'url avec l'id dans la table question et j'affiche le contenu s'y rapportant comme demandé dans ma boucle plus bas.


	$myQuestion = $db_connect->query($sql);
	echo $db_connect->error;


while($row = $myQuestion->fetch_object()) :
		$allRowsQuest[] = $row; 
endwhile; //Boucle

//myPrint_r($allRowsQuest);

//UPDATE une question et ses réponses.

if(isset($_POST['my_Update'])) : //Parce qu'il est dans mon input hidden name="".
	$sql = sprintf("UPDATE question SET titre='%s', date='%s' WHERE id_questions='%d'", //'%d' car je rentre dans un tableau.
		$_POST['titre'], //je remplace le titre.
		$_POST['date'],	//je remplace la date.
		$_POST['id_question'] //je remplace l'id_question signalé dans le name="" de l'input hidden.
		);
//echo $sql;
$db_connect->query($sql); //Je me connecte à la base de donnée.
$db_connect->error; //J'affiche s'il y a une erreur.


header("location:index.php?id_questions=".$_POST['my_Update']); //Dans mon url j'affiche la page réponse dont l'id questions = id_questions. $_GET est un array qui contient tout les paramètres d'url. Donc $_Get récupère ce qu'il y a après le "?". Donc ce qui est dans l'id_questions, ce qu'il y a dans la colonne id_questions et je l'affiche. Quand je suis dans index.php il retourne direct à l index donc je rappel pas de tableau uo de colones donc pas besoin de propriété de redirection..
exit;
endif;
?>
<?php include("header.php"); ?>
	<main>
			
					
			

			<form method="post">


				<label for="titre">Modifier la question :</label><br>
				<textarea name="titre" id="titre" value="<?php echo $_POST['id_questions']; ?>"><?php echo $allRowsQuest[0]->titre; ?></textarea><br>

				<label for="date"></label><br>
				<input type="date" name="date" id="date" value="<?php echo $allRowsQuest[0]->date; ?>"><br>


				<input type="hidden" name="my_Update" value="yes">
				<input type="hidden" name="id_question" value="<?php echo $allRowsQuest[0]->id_questions; ?>">
				
				<input type="submit" value="Envoyer"></input>

			</form>


			<?php include("footer.php"); ?>

</main>