<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php


//Nouvelle question, comment fonctionne la requete sql insert
if(isset($_POST['new_reponse'])) :
$sql =sprintf("INSERT INTO reponse SET label='%s', id_auteur=%s, date= '%s', id_question=%s",
addslashes($_POST['label']),
$_POST['pseudo'],
$_POST['date'],
$_POST['id_question']
);//Sprintf evite que quelqu un envoit... et qu'on nous embête. C'est du texte et aura bien du string.




$db_connect -> query($sql);
echo $db_connect -> error;

header("location:reponse.php?id_questions=".$_POST['id_question']);  //Neutralise le post qu'il ne renvoit pas deux fois lors du refresh.
exit;

endif;

//Requête Questtion

echo $sql = "SELECT * FROM question WHERE id_questions = " .$_GET['id_questions']; //
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
<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8"/>
    <title>index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0/">
		<meta name="keywords" content="Web,HTML,CSS,XML,JavaScript" />
		<meta name="description" content="Site Web bla bla bla" />
		<meta name="author" content="name" />
		<link href="css/main.css" rel="stylesheet" media="screen" />
  	<!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script>window.html5 || document.write('<script src="js/html5shiv.js"><\/script>')</script>
  	<![endif]-->
	</head>
<body>
	<div class="container">

	<header>
		<h1>Les réponses.</h1>
	</header>

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
					</li>

				<?php endfor;?> <!-- Fin de ma boucle -->
			</ul>

		<?php else : ?><!-- Sinon, lorsque je fais ma requête sur les réponses le num de colone est negatif alors... -->
			<p>Il n'y a pas de réponse</p> <!-- J'affiche ceci. -->
		<?php endif; ?> <!-- Fin du If -->





		<section>
			<h1>Ajoutez votre réponse</h1>

				<form method="post">

				<label for="label">Votre réponse</label><br>
				<textarea name="label" id="label"></textarea><br>


				<label for="pseudo">Pseudo</label><br>
				<input type="texte" name="pseudo" id="pseudo"><br>

				<label for="date"></label><br>
				<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">

				<input type="hidden" name="id_question" value="<?php echo $_GET['id_questions']; ?>">
				<input type="hidden" name="new_reponse" value="yes">

				<input type="submit" value="Envoyer"></input>
			
		</form>
	</section>

	</main>

	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>