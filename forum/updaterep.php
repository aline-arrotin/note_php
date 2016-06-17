<?php include("config.php"); ?>
<?php include("function.php"); ?>
<?php


//Requête Questtion

$sql = "SELECT * FROM reponse WHERE id_reponse = ".$_GET['update']; //
//Requête à partir de ma table question. J'affiche l'id_questions (clé primaire définie dans la page index) par rapport à ma clé primaire. Ici l'id_questions vaut donc la clé primaire. Donc il compare l'id dans l'url avec l'id dans la table question et j'affiche le contenu s'y rapportant comme demandé dans ma boucle plus bas.


	$reponse_request = $db_connect->query($sql);
	echo $db_connect->error;


while($rep = $reponse_request->fetch_object()) : //La je recupère chaques réponses sous forme d objets.
		$allRowsRep[] = $rep; //Ici je les mets dans mon array.
endwhile; //Boucle

//myPrint_r($allRowsQuest);

//UPDATE une question et ses réponses.

if(isset($_POST['rep_Update'])) :
	 $sql = sprintf("UPDATE reponse SET label='%s', date='%s', id_question='%s' WHERE id_reponse='%d'",
		$_POST['label'], //je recupère les champs
		$_POST['date'],
		$_POST['id_question'],
		$_POST['id_reponse'] //Je récupère le champs id_reponse.
		);
//echo $sql;
$db_connect->query($sql); //Je me connecte à la base de donnée.
$db_connect->error; //J'affiche s'il y a une erreur.


header("location:reponse.php?id_questions=".$_POST['id_question']); //Dans mon url j'affiche la page réponse dont l'id questions = id_questions. $_GET est un array qui contient tout les paramètres d'url. Donc $_Get récupère ce qu'il y a après le "?". Donc ce qui est dans l'id_questions, ce qu'il y a dans la colonne id_questions et je l'affiche. Quand je suis dans index.php il retourne direct à l index donc je rappel pas de tableau uo de colones donc pas besoin de propriété de redirection..
exit;
endif;



//Attribution d'un id à une nouvelle question.

$sql = "SELECT titre, id_questions FROM question";

	$choice_request = $db_connect->query($sql);
	echo $db_connect->error;


while($rep = $choice_request->fetch_object()) : //La je recupère chaques réponses sous forme d objets.
		$allRowsChoice[] = $rep; //Ici je les mets dans mon array.
endwhile; //Boucle



?>
<?php include("header.php"); ?>
	<main>
			

			

			<form method="post">


				<label for="label">Modifier la réponse :</label><br>
				<textarea name="label" id="label"><?php echo $allRowsRep[0]->label; ?></textarea><br> <!-- Laisser tout lié en bloc, directement tout sur une ligne sinon problèmes. -->

				<label for="date"></label><br>
				<input type="date" name="date" id="date" value="<?php echo $allRowsRep[0]->date; ?>"><br>
				
				
				<select name="id_question" id="">
				<?php  for($i=0; $i< count($allRowsChoice); $i++) : ?>
				<?php $thisRow = $allRowsChoice[$i]; ?>
				<option value="<?php echo $thisRow->id_questions; ?>" <?php echo ($thisRow->id_questions ==$allRowsRep[0]->id_question) ? 'selected' : ''; ?>><?php echo $thisRow->titre; ?></option>
				<?php endfor; //Si la clé primaire de la question de l'option est egal a la clé secondaire de la question que j'édite alors je met selected, si NON je ne bouge pas. ?>
				</select>

				<input type="hidden" name="rep_Update" value="yes"><!-- Ici j'appel ma propriété nam="rep-Update" et plus au je la ré-utilise. Permet de savoir quel formulaire je recoit dans le POST -->
				<input type="hidden" name="id_question2" value="<?php echo $allRowsRep[0]->id_question; ?>"> <!-- Ici je place un champs masqué qui rappel l'id_question de la table reponse dans l'url  et ca me permet de le réafficher. Donc j'ai ma page réponse qui s'affiche avec les modifs. -->
				<input type="hidden" name="id_reponse" value="<?php echo $allRowsRep[0]->id_reponse; ?>"> <!-- Ici je place un champs masqué qui appel l'id_reponse de ta table réponse et me permet plus haut de le modifier avec la nouvelle réponse. -->
				<input type="submit" value="Envoyer"></input>

			</form>


			<?php include("footer.php"); ?>

</main>