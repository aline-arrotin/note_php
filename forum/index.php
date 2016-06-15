<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php 

//Nouvelle question, comment fonctionne la requete sql insert
if(isset($_POST['new_question'])) :
$sql =sprintf("INSERT INTO question SET titre='%s', id_auteur=%s, date= '%s'",
$_POST['titre'],
$_POST['pseudo'],
$_POST['date']
);//Sprintf evite que quelqu un envoit... et qu'on nous embête. C'est du texte et aura bien du string.




$db_connect -> query($sql);
header('location:index.php'); //Neutralise le post qu'il ne renvoit pas deux fois.
exit;

endif;

//Requête Question.

$sql = "SELECT titre, date, pseudo, email, id_questions FROM question_auteur"; //Requête à partir de ma vue.

	$question_request = $db_connect->query($sql);
	echo $db_connect->error;


while($row = $question_request->fetch_object()) :
		$allRowsQuest[] = $row; 
endwhile;//Boucle

?>

<?php include("header.php"); ?>



	<ul>

	<?php  for($i=0; $i< count($allRowsQuest); $i++) : ?>
		<?php $thisRow =  $allRowsQuest[$i]; ?>

		<li class="question">
		<h2><a href="reponse.php?id_questions=<?php echo $allRowsQuest[$i]->id_questions ?>"> <!-- Nom de la page vers laquelle je redirige + Ici j'appel l'id de la clé primaire "id_questions"(toujours utiliser la clé primaire) et je l'affiche dans l'URL. Il affiche dans l'autre page le contenu se rapportant à cet id-->
		<?php echo $thisRow->titre; ?></a></h2>
		<p><?php $thisRow->pseudo; ?></p>
		<p><?php echo $thisRow->email; ?></p>

		<?php if($allRowsQuest[$i]->date != '' AND $allRowsQuest[$i]->date != '0000-00-00') : ?>
			<p class="date"><?php echo dateAff($allRowsQuest[$i]->date,"/"); ?></p>  <!-- Pas valable pour un datetime. C'est pour un date. -->
		<?php endif; ?>
		</li>
	<?php endfor;?>

	</ul>

	<section>
		<h1>Ajoutez votre question</h1>

		<form method="post">

		<label for="titre">Votre question</label><br>
		<textarea name="titre" id="titre"></textarea><br>


		<label for="pseudo">Pseudo</label><br>
		<input type="texte" name="pseudo" id="pseudo"><br>

		<label for="date"></label><br>
		<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">

		<input type="hidden" name="new_question" value="yes">
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
