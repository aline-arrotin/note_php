<?php 
class QuestionsView{
	function __construct(){

	}

	function listing($array) {?>
		<h1>Les questions</h1>
		<ul>
			<?php for($i=0; $i < count($array); $i++) :
				$myRow = $array[$i]; ?>
			<li>
				<h2><a href="?view=reponses&id_question=<?php echo $myRow ->id_questions ?>"><?php echo $myRow -> titre; ?></a></h2>
				<p class="auteur"><?php echo $myRow -> pseudo ?></p>
				<p class="date"><?php echo dateAff($myRow -> date, "/"); ?></p>
			</li>
			<a href="?delete=<?php echo $allRowsQuest[$i]->id_questions; ?>" class="delete">DELETE </a>
		<?php endfor; ?>
		</ul>

	<?php }

		function insert_forms() {?>
			<form method="post">

			<label for="titre">Votre question</label><br>
			<textarea name="titre" id="titre"></textarea><br>


			<label for="date"></label><br>
			<!-- <input type="hidden" name="date" id="date" value="<?php //echo date('Y-m-d'); ?>"> -->

			<input type="hidden" name="new_Quest" value="yes">
			<input type="submit" value="Envoyer"></input>
				
			</form>
		<?php }
	}
?>