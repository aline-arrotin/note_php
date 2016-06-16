<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php

//Delete une réponse.

if(isset($_GET['delete'])) :
	$sql = sprintf("DELETE FROM reponse WHERE id_reponse ='%s'",
		$_GET['delete']
		);
//echo $sql;
$db_connect->query($sql); //Je me connecte à la base de donnée.
echo $db_connect->error; //J'affiche s'il y a une erreur.
header("location:reponse.php?id_questions=" .$_GET['id_questions']); //Dans mon url j'affiche la page réponse dont l'id questions = id_questions. *_Get est un array qui contient tout les parametres d'url. Donc $_Get récupère ce qu'il y a après le "?". Donc ce qui est dans l'id_questions, ce qu'il y a dans la colonne id_questions.
exit;
endif;

//Nouvelle question, comment fonctionne la requete sql insert
if(isset($_POST['new_reponse'])) :
$sql =sprintf("INSERT INTO reponse SET label='%s', id_auteur=%s, date= '%s', id_question=%s",//sprintf transforme en chaine de caractère. %s variable interne à la fonction sprintf
		addslashes($_POST['label']),//
		$_SESSION['auteur']['id_auteurs'],
		date('Y-m-d'), //On utilise la propriété date de php c'est plus secure.
		$_POST['id_question']
);//Sprintf evite que quelqu un envoit... et qu'on nous embête. C'est du texte et aura bien du string.

$db_connect -> query($sql);
echo $db_connect -> error;

header("location:reponse.php?id_questions=".$_POST['id_question']);  //Neutralise le post qu'il ne renvoit pas deux fois lors du refresh. Quand je clique sur une question je suis redirigee vers la page reponse //Dans mon url j'affiche la page réponse dont l'id questions = id_questions
exit;

endif;

//Requête Questtion

$sql = "SELECT * FROM question WHERE id_questions = " .$_GET['id_questions']; //
//Requête à partir de ma table question. J'affiche l'id_questions (clé primaire définie dans la page index) par rapport à ma clé primaire. Ici l'id_questions vaut donc la clé primaire. Donc il compare l'id dans l'url avec l'id dans la table question et j'affiche le contenu s'y rapportant comme demandé dans ma boucle plus bas.

	$myQuestion = $db_connect->query($sql);
	echo $db_connect->error;


while($row = $myQuestion->fetch_object()) :
		$allRowsQuest[] = $row; 
endwhile; //Boucle



//Trouver les réponses.

$sql = "SELECT * FROM reponse_auteur WHERE id_question = " .$_GET['id_questions'];
//Requête à partir de ma vue. J'affiche l'id_questions (clé primaire définie dans la page index) par rapport à ma clé secondaire. Ici l'id_questions vaut donc la clé secondaire. Donc il compare l'id dans l'url avec l'id_question contenu dans ma vue reponse_auteur. Et j'affiche le contenu s'y rapportant comme demandé dans ma boucle plus bas.

	$reponse_request = $db_connect->query($sql); //Query requête sql.
	echo $db_connect->error;


while($rep = $reponse_request->fetch_object()) : //La je recupère chaques réponses sous forme d objets.
		$allRowsRep[] = $rep; //Ici je les mets dans mon array.
endwhile; //Boucle

?>
<?php include("header.php"); ?>
<h1>Les réponses</h1>
	<main>

	<?php  for($i=0; $i< count($allRowsQuest); $i++) : ?> <!-- Je crée une boucle pour afficher le titre de ma requête sur les questions. -->
		<h2><?php echo $allRowsQuest[$i]->titre; ?></h2> <!-- Je l'affiche. -->
	<?php endfor;?> <!-- Je finis la boucle. -->


		<?php if($reponse_request->num_rows > 0) : ?> <!-- Ma propriété num_row depend de ma query. Si lorsque je fais ma query sur les réponses le num de colonne n'est pas negatif alors, je fais ma boucle... -->
			<ul>
				<?php  for($i=0; $i< count($allRowsRep); $i++) : ?> <!-- Je crée une boucle pour afficher les données dans ma vue reponse_auteur. -->
					<?php $thisRow = $allRowsRep[$i];  ?> <!-- Je crée une variable $thisRow que je vais répeter plus bas pour ne pas afficher une longue phrase. -->
					
					<li class="question">
						<p><?php echo $thisRow->label; ?></p> <!-- J'affiche la/les réponse(s) à ma question. -->

						<?php if($thisRow->date != '' AND $thisRow->date != '0000-00-00') : ?>
							<p class="date"><?php echo dateAff($thisRow->date,"/"); ?></p>  <!-- J'affiche ma date. Pas valable pour un datetime. C'est pour un date. -->
						<?php endif; ?>

						<?php if(isset($_SESSION['auteur']['id_auteurs']) AND $thisRow->id_auteurs == $_SESSION['auteur']['id_auteurs']) :  ?> <!-- Si j'ai l'id_auteurs AND que l'id_auteurs est == a l'id_auteurs de la session, alors je peux supprimer la question. -->
						<a href="reponse.php?delete=<?php echo $thisRow->id_reponse; ?>&id_questions=<?php echo $_GET['id_questions']; ?>" class="delete">DELETE </a>
						<!-- Dans mon url de page reponse, ca me met un parametre delete avec l'id_reponse(celui à supprimer) et ensuite je met l'id question pour revenir sur la page.  -->
						<?php endif; ?>
					</li>

				<?php endfor;?> <!-- Fin de ma boucle -->

			</ul>

		<?php else : ?><!-- Sinon, lorsque je fais ma requête sur les réponses le num de colone est negatif alors... -->
			<p>Il n'y a pas de réponse</p> <!-- J'affiche ceci. -->
		<?php endif; ?> <!-- Fin du If -->




		<section>
			<h1>Ajoutez votre réponse</h1>

			<?php if(isset($_SESSION['auteur'])) :  ?>

				<form method="post">

				<label for="label">Votre réponse</label><br>
				<textarea name="label" id="label"></textarea><br>


				<label for="date"></label><br>
				<!-- <input type="hidden" name="date" id="date" value="<?php //echo date('Y-m-d'); ?>"> --> <!-- Ne sert a rien les gens peuvent modifier et fausser, remplacer dans php au dessus. -->

				<input type="hidden" name="id_question" value="<?php echo $_GET['id_questions']; ?>">
				<input type="hidden" name="new_reponse" value="yes">

				<input type="submit" value="Envoyer"></input>
			
		</form>
	</section>

			<?php else : ?>
			<p>Connecte toi hein malin!!! Mais quelle clète se paye!!!</p>

	<?php endif; ?>

	</main>
<?php require("footer.php"); ?>

