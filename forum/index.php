<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php 

//Delete une question et ses réponses.

if(isset($_GET['delete'])) :
	$sql = sprintf("DELETE FROM question WHERE ['id_questions']['id_question']='%s'",
		$_GET['delete']
		);
//echo $sql;
$db_connect->query($sql); //Je me connecte à la base de donnée.
$db_connect->error; //J'affiche s'il y a une erreur.
header("location:index.php"); //Dans mon url j'affiche la page réponse dont l'id questions = id_questions. $_GET est un array qui contient tout les paramètres d'url. Donc $_Get récupère ce qu'il y a après le "?". Donc ce qui est dans l'id_questions, ce qu'il y a dans la colonne id_questions et je l'affiche. Quand je suis dans index.php il retourne direct à l index donc je rappel pas de tableau uo de colones donc pas besoin de propriété de redirection..
exit;
endif;

// if(isset($_GET['delete_post'])) :
// 	$sql = sprintf("DELETE FROM reponse WHERE ['id_questions']['id_question']='%s'",
// 		$_GET['delete_post']
// 		);
// //echo $sql;
// $db_connect->query($sql); //Je me connecte à la base de donnée.
// $db_connect->error; //J'affiche s'il y a une erreur.
// header("location:index.php"); //Dans mon url j'affiche la page réponse dont l'id questions = id_questions. $_GET est un array qui contient tout les paramètres d'url. Donc $_Get récupère ce qu'il y a après le "?". Donc ce qui est dans l'id_questions, ce qu'il y a dans la colonne id_questions et je l'affiche.
// exit;
// endif;



//Nouvelle question, comment fonctionne la requete sql insert
if(isset($_POST['new_question'])) :
$sql = sprintf("INSERT INTO question SET titre='%s', id_auteur=%s, date= '%s'",
$_POST['titre'],
$_SESSION['auteur']['id_auteurs'],
date('Y-m-d')
);//Sprintf evite que quelqu un envoit... et qu'on nous embête. C'est du texte et aura bien du string.




$db_connect -> query($sql);
header('location:index.php'); //Neutralise le post qu'il ne renvoit pas deux fois.
exit;

endif;

//Requête Question.

$sql = "SELECT titre, date, pseudo, email, id_questions, id_auteurs FROM question_auteur"; //Requête à partir de ma vue.

	$question_request = $db_connect->query($sql);
	echo $db_connect->error;


while($row = $question_request->fetch_object()) :
		$allRowsQuest[] = $row; 
endwhile;//Boucle

?>

<?php include("header.php"); ?>

	<h1>Les questions</h1>

	<ul>

	<?php  for($i=0; $i< count($allRowsQuest); $i++) : ?>
		<?php $thisRow =  $allRowsQuest[$i]; ?>

		<li class="question">
			<h1><a href="reponse.php?id_questions=<?php echo $allRowsQuest[$i]->id_questions ?>"> <!-- Nom de la page vers laquelle je redirige + Ici j'appel l'id de la clé primaire "id_questions"(toujours utiliser la clé primaire) et je l'affiche dans l'URL. Il affiche dans l'autre page le contenu se rapportant à cet id-->
			<?php echo $thisRow->titre; ?></a></h1>
			<p><?php $thisRow->pseudo; ?></p>
			<p><?php echo $thisRow->email; ?></p>

			<?php if($allRowsQuest[$i]->date != '' AND $allRowsQuest[$i]->date != '0000-00-00') : ?>
				<p class="date"><?php echo dateAff($allRowsQuest[$i]->date,"/"); ?></p>  <!-- Pas valable pour un datetime. C'est pour un date. -->
				
				<?php if (isset($_SESSION['auteur']['id_auteurs']) AND $allRowsQuest[$i]->id_auteurs == $_SESSION['auteur']['id_auteurs']) :  ?> <!-- Si j'ai l'id_auteurs AND que l'id_auteurs est == a l'id_auteurs de la session, alors je peux supprimer la question. -->
				<a href="index.php?delete=<?php echo $allRowsQuest[$i]->id_questions; ?>" class="delete">DELETE </a> <!-- Je met un parametre au clic. Tu me mets dans l url index.php et tu mets le parametre delete avec la valeur correspondante à l'id question. Et comme je suis sur l'index, je ne rajoute pas de paramètre pour récupérer ma position vis à vis de la question. Pas besoin de recharger ma page.-->
				<?php endif; ?>

			<?php endif; ?>
		</li>
	<?php endfor;?>

	<main>

	</ul>


	<section>

	<h1>Ajoutez votre question</h1>
			<?php if(isset($_SESSION['auteur'])) :  ?>

		<form method="post">

		<label for="titre">Votre question</label><br>
		<textarea name="titre" id="titre"></textarea><br>


		<label for="date"></label><br>
		<!-- <input type="hidden" name="date" id="date" value="<?php //echo date('Y-m-d'); ?>"> -->

		<input type="hidden" name="new_question" value="yes">
		<input type="submit" value="Envoyer"></input>
			
		</form>
	</section>

		<?php else : ?>
			<p>Connecte toi hein malin!!! Mais quelle clète se paye!!!</p>

	<?php endif; ?>
	</main>
<?php require("footer.php"); ?>




